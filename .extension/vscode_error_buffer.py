import sys
import traceback
import json
import os
from datetime import datetime
import platform

if not hasattr(sys, '_vscode_error_context_installed'):
    print("[VS Code Error Context] Python error buffer active")
    
    def log_error_context(exc_type, exc_value, exc_traceback):
        if exc_type is KeyboardInterrupt:
            return
        
        sys.__excepthook__(exc_type, exc_value, exc_traceback)
        
        error_info = {
            "language": "python",
            "timestamp": datetime.now().isoformat(),
            "error_output": ''.join(traceback.format_exception(exc_type, exc_value, exc_traceback)),
            "exit_code": 1,
            "cwd": os.getcwd(),
            "python_version": sys.version,
            "platform": platform.system(),
            "pid": os.getpid()
        }
        
        extension_dir = None
        current_dir = os.getcwd()
        max_depth = 10
        depth = 0
        
        while current_dir != os.path.dirname(current_dir) and depth < max_depth:
            test_dir = os.path.join(current_dir, ".extension")
            if os.path.exists(test_dir):
                extension_dir = test_dir
                break
            current_dir = os.path.dirname(current_dir)
            depth += 1
        
        if extension_dir:
            timestamp = datetime.now().strftime("%Y%m%d_%H%M%S_%f")
            buffer_file = os.path.join(extension_dir, f"vscode_error_buffer_{timestamp}.json")
            
            try:
                with open(buffer_file, 'w', encoding='utf-8') as f:
                    json.dump(error_info, f, indent=2, ensure_ascii=False)
                print(f"[VS Code Error Context] Error context saved: {buffer_file}")
            except Exception as e:
                print(f"[VS Code Error Context] Failed to save error context: {e}")
        else:
            print("[VS Code Error Context] .extension directory not found - error context not saved")
            print(f"   Searched from: {os.getcwd()}")

    sys.excepthook = log_error_context
    sys._vscode_error_context_installed = True
    print("[VS Code Error Context] Python error logging is now active")
else:
    print("[VS Code Error Context] Python error logging already active")