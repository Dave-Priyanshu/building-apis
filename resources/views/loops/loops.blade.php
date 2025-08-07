<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover:hover { transform: translateY(-3px); box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); }
        .card-hover:focus-within { transform: translateY(-3px); box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); }
        .sticky-nav { position: sticky; top: 0; z-index: 10; }
        .nav-link { transition: background-color 0.2s ease; }
        .nav-link:hover, .nav-link:focus { background-color: #2563eb; }
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-800 min-h-screen">
    <nav class="sticky-nav bg-white shadow-md py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">Loops Demonstration</h1>
            <a href="{{ route('loops2') }}" class="nav-link bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-label="Navigate to Second Loop Page">Second Loop Page</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Section 1: Numbers 1 to 10 -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="numbers-1-to-10">
                <h2 id="numbers-1-to-10" class="text-lg font-semibold text-gray-900 mb-3">Numbers 1 to 10</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @for($a = 0; $a <= 10; $a++)
                        {{ $a }} 
                    @endfor
                </div>
            </div>

            <!-- Section 2: Even Numbers 1 to 20 -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="even-numbers">
                <h2 id="even-numbers" class="text-lg font-semibold text-gray-900 mb-3">Even Numbers 1 to 20</h2>
                <div class="text-gray-700 font-mono text-sm">
                    <strong>Direct:</strong><br>
                    @for($a = 2; $a <= 20; $a += 2)
                        {{ $a }} 
                    @endfor
                    <br><br>
                    <strong>Using Condition:</strong><br>
                    @for($a = 1; $a <= 20; $a++)
                        @if($a % 2 == 0)
                            {{ $a }} 
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Section 3: Sum of Numbers 1 to 100 -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="sum-numbers">
                <h2 id="sum-numbers" class="text-lg font-semibold text-gray-900 mb-3">Sum of Numbers 1 to 100</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $sum = 0;
                        for ($i = 1; $i <= 100; $i++) {
                            $sum += $i;
                        }
                    @endphp
                    Sum: {{ $sum }}
                </div>
            </div>

            <!-- Section 4: Multiplication Table -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="multiplication-table">
                <h2 id="multiplication-table" class="text-lg font-semibold text-gray-900 mb-3">Multiplication Table of 5</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $number = 5;
                    @endphp
                    @for($i = 1; $i <= 10; $i++)
                        {{ $number }} × {{ $i }} = {{ $number * $i }}<br>
                    @endfor
                </div>
            </div>

            <!-- Section 5: Reverse String -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="reverse-string">
                <h2 id="reverse-string" class="text-lg font-semibold text-gray-900 mb-3">Reverse a String</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $string = "Priyanshu";
                        $rev = "";
                        for($i = strlen($string) - 1; $i >= 0; $i--) {
                            $rev .= $string[$i];
                        }
                    @endphp
                    Original: {{ $string }}<br>
                    Reversed: {{ $rev }}
                </div>
            </div>

            <!-- Section 6: Factorial -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="factorial">
                <h2 id="factorial" class="text-lg font-semibold text-gray-900 mb-3">Factorial of 5</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $number = 5;
                        $factorial = 1;
                        for($i = 1; $i <= $number; $i++) {
                            $factorial *= $i;
                        }
                    @endphp
                    Factorial: {{ $factorial }}
                </div>
            </div>

            <!-- Section 7: Fibonacci Numbers -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="fibonacci">
                <h2 id="fibonacci" class="text-lg font-semibold text-gray-900 mb-3">First 10 Fibonacci Numbers</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $n = 10;
                        $a = 0;
                        $b = 1;
                    @endphp
                    {{ $a }} 
                    @for($i = 1; $i < $n; $i++)
                        {{ $b }} 
                        @php
                            $next = $a + $b;
                            $a = $b;
                            $b = $next;
                        @endphp
                    @endfor
                </div>
            </div>

            <!-- Section 8: Vowel Count -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="vowel-count">
                <h2 id="vowel-count" class="text-lg font-semibold text-gray-900 mb-3">Count Vowels in a String</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $strA = "priyanshu";
                        $vowels = ['a', 'e', 'i', 'o', 'u'];
                        $count = 0;
                        for($i = 0; $i < strlen($strA); $i++) {
                            if(in_array(strtolower($strA[$i]), $vowels)) {
                                $count++;
                            }
                        }
                    @endphp
                    String: {{ $strA }}<br>
                    Vowel Count: {{ $count }}
                </div>
            </div>

            <!-- Section 9: Star Pattern -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="star-pattern">
                <h2 id="star-pattern" class="text-lg font-semibold text-gray-900 mb-3">Right Triangle Star Pattern</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $row = 5;
                    @endphp
                    @for($i = 0; $i <= $row; $i++)
                        {{ str_repeat("★", $i) }}<br>
                    @endfor
                </div>
            </div>

            <!-- Section 10: Prime Number Check -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="prime-check">
                <h2 id="prime-check" class="text-lg font-semibold text-gray-900 mb-3">Check Prime Number (17)</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $num = 17;
                        $isPrime = true;
                        if ($num < 2) {
                            $isPrime = false;
                        }
                        for ($i = 2; $i <= sqrt($num); $i++) {
                            if ($num % $i == 0) {
                                $isPrime = false;
                                break;
                            }
                        }
                    @endphp
                    {{ $num }} is {{ $isPrime ? "prime" : "not prime" }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>