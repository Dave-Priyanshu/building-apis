<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Loop Demo</title>
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
            <h1 class="text-2xl font-bold text-gray-900">Second Loop Demonstration</h1>
            <a href="{{ route('loops') }}" class="nav-link bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-label="Navigate to First Loop Page">First Loop Page</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Section 1: Descending Numbers -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="descending-numbers">
                <h2 id="descending-numbers" class="text-lg font-semibold text-gray-900 mb-3">Numbers 50 to 100 (Descending)</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @for($i = 100; $i >= 50; $i--)
                        {{ $i }} 
                    @endfor
                </div>
            </div>

            <!-- Section 2: Odd Numbers -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="odd-numbers">
                <h2 id="odd-numbers" class="text-lg font-semibold text-gray-900 mb-3">Odd Numbers 1 to 30</h2>
                <div class="text-gray-700 font-mono text-sm">
                    <strong>Direct:</strong><br>
                    @for($i = 1; $i <= 30; $i += 2)
                        {{ $i }} 
                    @endfor
                    <br><br>
                    <strong>Using Condition:</strong><br>
                    @for($i = 1; $i <= 30; $i++)
                        @if($i % 2 != 0)
                            {{ $i }} 
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Section 3: Sum of Even Numbers -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="sum-even">
                <h2 id="sum-even" class="text-lg font-semibold text-gray-900 mb-3">Sum of Even Numbers 1 to 50</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $sum = 0;
                        for($i = 0; $i <= 50; $i++) {
                            if($i % 2 == 0) {
                                $sum += $i;
                            }
                        }
                    @endphp
                    Total: {{ $sum }}
                </div>
            </div>

            <!-- Section 4: Reverse Multiplication Table -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="reverse-multiplication">
                <h2 id="reverse-multiplication" class="text-lg font-semibold text-gray-900 mb-3">Multiplication Table of 10 (Reverse)</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $number = 10;
                    @endphp
                    @for($i = 10; $i >= 1; $i--)
                        {{ $number }} × {{ $i }} = {{ $number * $i }}<br>
                    @endfor
                </div>
            </div>

            <!-- Section 5: Consonant Count -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="consonant-count">
                <h2 id="consonant-count" class="text-lg font-semibold text-gray-900 mb-3">Count Consonants</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $str = "Priyanshu Dave";
                        $vowel = ['a', 'e', 'i', 'o', 'u'];
                        $consonantCount = 0;
                        for($i = 0; $i < strlen($str); $i++) {
                            $char = strtolower($str[$i]);
                            if(ctype_alpha($char) && !in_array($char, $vowel)) {
                                $consonantCount++;
                            }
                        }
                    @endphp
                    String: {{ $str }}<br>
                    Consonant Count: {{ $consonantCount }}
                </div>
            </div>

            <!-- Section 6: Sequence -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="sequence">
                <h2 id="sequence" class="text-lg font-semibold text-gray-900 mb-3">Sequence: 1, 3, 5, 7... (12 Numbers)</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $num = 1;
                    @endphp
                    @for($i = 1; $i <= 12; $i++)
                        {{ $num }} 
                        @php
                            $num += 2;
                        @endphp
                    @endfor
                </div>
            </div>

            <!-- Section 7: Sum of Squares -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="sum-squares">
                <h2 id="sum-squares" class="text-lg font-semibold text-gray-900 mb-3">Sum of Squares 1 to 10</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $sum = 0;
                        for($i = 1; $i <= 10; $i++) {
                            $sum += $i * $i;
                        }
                    @endphp
                    Sum: {{ $sum }}
                </div>
            </div>

            <!-- Section 8: Reverse Star Pattern -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="reverse-star">
                <h2 id="reverse-star" class="text-lg font-semibold text-gray-900 mb-3">Reverse Right Triangle Star Pattern</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $row = 5;
                    @endphp
                    @for($i = $row; $i >= 1; $i--)
                        @for($j = 1; $j <= $i; $j++)
                            ★
                        @endfor
                        <br>
                    @endfor
                </div>
            </div>

            <!-- Section 9: Right Triangle Star Pattern -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="right-star">
                <h2 id="right-star" class="text-lg font-semibold text-gray-900 mb-3">Right Triangle Star Pattern</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @for($i = 1; $i <= $row; $i++)
                        @for($j = 1; $j <= $i; $j++)
                            ★
                        @endfor
                        <br>
                    @endfor
                </div>
            </div>

            <!-- Section 10: Sum of Digits -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="sum-digits">
                <h2 id="sum-digits" class="text-lg font-semibold text-gray-900 mb-3">Sum of Digits (123)</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $number = 123;
                        $sum = 0;
                        $digit = strval($number);
                        for($i = 0; $i < strlen($digit); $i++) {
                            $sum += (int)$digit[$i];
                        }
                    @endphp
                    Number: {{ $number }}<br>
                    Sum of Digits: {{ $sum }}
                </div>
            </div>

            <!-- Section 11: Palindrome Check -->
            <div class="bg-white p-6 rounded-lg shadow-sm card-hover" role="region" aria-labelledby="palindrome">
                <h2 id="palindrome" class="text-lg font-semibold text-gray-900 mb-3">Check Palindrome</h2>
                <div class="text-gray-700 font-mono text-sm">
                    @php
                        $string = "level";
                        $isPalindrome = true;
                        $len = strlen($string);
                        for($i = 0; $i < $len; $i++) {
                            if($string[$i] != $string[$len - 1 - $i]) {
                                $isPalindrome = false;
                                break;
                            }
                        }
                    @endphp
                    String: {{ $string }}<br>
                    {{ $string }} is {{ $isPalindrome ? "a palindrome" : "not a palindrome" }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>