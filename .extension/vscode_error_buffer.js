
const fs = require('fs');
const path = require('path');
const os = require('os');

if (!process.env._VSCODE_ERROR_CONTEXT_INSTALLED) {
    process.on('uncaughtException', (err, origin) => {
        // Let the original error still print to the console
        console.error(err);

        const errorInfo = {
            language: 'typescript',
            timestamp: new Date().toISOString(),
            error_output: err.stack || err.toString(),
            exit_code: 1,
            cwd: process.cwd(),
            node_version: process.version,
            platform: os.platform(),
            pid: process.pid
        };

        let currentDir = process.cwd();
        let extensionDir = null;
        for (let i = 0; i < 10; i++) { // Traverse up max 10 levels
            const testDir = path.join(currentDir, '.extension');
            if (fs.existsSync(testDir)) {
                extensionDir = testDir;
                break;
            }
            const parentDir = path.dirname(currentDir);
            if (parentDir === currentDir) break;
            currentDir = parentDir;
        }

        if (extensionDir) {
            try {
                const timestamp = new Date().toISOString().replace(/[\/:"*?<>|]/g, '-');
                const bufferFile = path.join(extensionDir, `vscode_error_buffer_${timestamp}.json`);
                fs.writeFileSync(bufferFile, JSON.stringify(errorInfo, null, 2));
                console.log(`[VS Code Error Context] Error context saved: ${bufferFile}`);
            } catch (writeErr) {
                console.error(`[VS Code Error Context] Failed to save error context:`, writeErr);
            }
        } else {
            console.error("[VS Code Error Context] .extension directory not found - error context not saved");
        }

        // It's important to exit, otherwise the broken process might continue.
        // This mirrors the default behavior of an uncaught exception.
        process.exit(1);
    });

    process.env._VSCODE_ERROR_CONTEXT_INSTALLED = 'true';
    console.log("[VS Code Error Context] Node.js error logging is now active");
}
