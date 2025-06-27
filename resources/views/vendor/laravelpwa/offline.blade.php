<!DOCTYPE html>
<html lang="en">
<head>
    @laravelPWA
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Learning Hub - Offline</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-in { animation: slideIn 0.6s ease-out; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-pulse { animation: pulse 2s infinite; }
        .game-container { transition: all 0.3s ease; }
        .game-container:hover { transform: scale(1.02); }
        #codeInput { 
            background: #1e293b; 
            color: #fff; 
            font-family: 'Courier New', monospace; 
            resize: none; 
            border-radius: 8px; 
            border: 1px solid rgba(255, 255, 255, 0.2); 
        }
        #codeInput:focus { 
            outline: none; 
            border-color: #3b82f6; 
            box-shadow: 0 0 8px rgba(59, 130, 246, 0.4); 
        }
        #codeSnippet { 
            font-family: 'Courier New', monospace; 
            background: #1e293b; 
            padding: 1rem; 
            border-radius: 8px; 
            color: #34d399; 
        }
        @media (max-width: 640px) {
            #codeSnippet { font-size: 0.9rem; }
            #codeInput { font-size: 0.9rem; }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-indigo-900 text-gray-100 font-sans">
    <div class="offline-container bg-gray-800 bg-opacity-90 p-6 sm:p-8 rounded-3xl shadow-2xl max-w-2xl w-11/12 backdrop-blur-lg border border-gray-700 animate-slide-in relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-transparent z-0"></div>
        <i class="uil uil-wifi-slash text-6xl sm:text-7xl text-rose-500 mb-6 animate-float block text-center z-10 relative"></i>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-400">Connection Lost</h1>
        <p class="text-base sm:text-lg md:text-xl text-gray-300 text-center mb-8 mx-auto max-w-md">
            <i class="uil uil-signal-alt-3 text-green-400 text-lg animate-pulse align-middle mr-2"></i>
            Looks like you're offline. Check your connection and try again!
        </p>
        <div class="game-container bg-gray-900 p-4 sm:p-6 rounded-2xl mb-8">
            <h2 class="text-xl sm:text-2xl font-semibold text-center mb-4 text-white">Code Typing Challenge</h2>
            <p class="text-gray-400 text-center mb-4 text-sm sm:text-base">Type the API code snippet before time runs out!</p>
            <div id="codeSnippet" class="mb-4 text-center"></div>
            <textarea id="codeInput" rows="3" class="w-full p-2 mb-4" placeholder="Type the code here..."></textarea>
            <div class="text-center">
                <p class="text-base sm:text-lg font-medium text-white mb-2">Score: <span id="score">0</span></p>
                <p class="text-base sm:text-lg font-medium text-white mb-4">Time Left: <span id="timer">30</span>s</p>
                <button id="startGame" class="px-4 sm:px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-lg font-semibold hover:from-blue-600 hover:to-purple-600 transition transform hover:scale-105">Start Game</button>
            </div>
        </div>
        <div class="text-center">
            <a href="#" class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-lg font-semibold text-base sm:text-lg hover:from-blue-600 hover:to-purple-600 transition transform hover:scale-105" onclick="window.location.reload()">
                <i class="uil uil-sync mr-2 text-lg sm:text-xl"></i> Refresh Now
            </a>
        </div>
        <div class="footer-text mt-6 text-xs sm:text-sm text-gray-400 flex items-center justify-center gap-2">
            <i class="uil uil-bulb text-yellow-400 text-base sm:text-lg"></i>
            Pro Tip: Try switching to a stronger Wi-Fi or mobile data.
        </div>
    </div>

    <script>
        const codeSnippet = document.getElementById('codeSnippet');
        const codeInput = document.getElementById('codeInput');
        const startButton = document.getElementById('startGame');
        const scoreDisplay = document.getElementById('score');
        const timerDisplay = document.getElementById('timer');

        let score = 0;
        let timeLeft = 30;
        let gameRunning = false;
        let timerInterval = null;

        const snippets = [
            'fetch("https://api.example.com/data")',
            'app.get("/api/users", (req, res) => {})',
            'axios.get("/api/data").then(res => {})',
            'curl -X GET "https://api.example.com"',
            'http.request("GET", "/api/resource")',
            '$.ajax({url: "/api/data", method: "GET"})',
            'const response = await fetch("/api")',
            'app.post("/api/save", (req, res) => {})'
        ];

        function getRandomSnippet() {
            return snippets[Math.floor(Math.random() * snippets.length)];
        }

        function startTimer() {
            timerInterval = setInterval(() => {
                timeLeft--;
                timerDisplay.textContent = timeLeft;
                if (timeLeft <= 0) {
                    endGame();
                    alert('Time’s up! Final Score: ' + score);
                }
            }, 1000);
        }

        function endGame() {
            gameRunning = false;
            clearInterval(timerInterval);
            codeInput.disabled = true;
            startButton.textContent = 'Start Game';
            codeSnippet.textContent = '';
            codeInput.value = '';
        }

        function startGame() {
            gameRunning = true;
            score = 0;
            timeLeft = 30;
            scoreDisplay.textContent = score;
            timerDisplay.textContent = timeLeft;
            codeInput.disabled = false;
            codeInput.value = '';
            codeInput.focus();
            codeSnippet.textContent = getRandomSnippet();
            startButton.textContent = 'Reset Game';
            clearInterval(timerInterval);
            startTimer();
        }

        codeInput.addEventListener('input', () => {
            if (!gameRunning) return;
            if (codeInput.value.trim() === codeSnippet.textContent) {
                score += 10;
                scoreDisplay.textContent = score;
                codeInput.value = '';
                codeSnippet.textContent = getRandomSnippet();
                timeLeft += 2; // Add 2 seconds for correct input
                timerDisplay.textContent = timeLeft;
            }
        });

        startButton.addEventListener('click', () => {
            if (!gameRunning) {
                startGame();
            } else {
                endGame();
            }
        });
    </script>
</body>
</html>