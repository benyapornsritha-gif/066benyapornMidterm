<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.7 ค้นหาจำนวนเฉพาะ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; -webkit-font-smoothing: antialiased; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-up { animation: fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-gray-100 min-h-screen flex flex-col">

    <nav class="bg-[#0f172a]/90 backdrop-blur-md text-white py-4 px-6 flex justify-between items-center shadow-md sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3 cursor-pointer hover:opacity-80 transition">
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 p-1.5 rounded-lg shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide">สอบกลางภาค</span>
            </div>
            <div class="hidden md:flex gap-8 text-sm font-medium items-center">
                <a href="#" class="text-gray-300 hover:text-white transition">คำอธิบาย</a>
                <a href="#" class="text-gray-300 hover:text-white transition">การเขียนโปรแกรมแบบมีเงื่อนไข ▾</a>
                <a href="#" class="text-blue-400 font-semibold border-b-2 border-blue-400 pb-1">เขียนโปรแกรมวนซ้ำ ▾</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto flex justify-center items-center py-12 px-4 relative">
        <div class="absolute top-10 right-20 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>
        <div class="absolute bottom-10 left-20 w-72 h-72 bg-cyan-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>

        <div class="max-w-4xl w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row border border-gray-100 relative z-10 min-h-[450px]">
            
            <div class="flex-1 p-8 md:p-12 relative flex flex-col justify-center">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">2.7</span>
                    ค้นหาจำนวนเฉพาะ
                </h2>
                
                <div class="space-y-5 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-blue-600 transition-colors">ช่วงเริ่มต้น (start)</label>
                        <input type="number" id="startInput" placeholder="กรอกช่วงเริ่มต้น" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none shadow-sm hover:border-blue-300 text-lg">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-blue-600 transition-colors">ช่วงสิ้นสุด (end)</label>
                        <input type="number" id="endInput" placeholder="กรอกช่วงสิ้นสุด" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none shadow-sm hover:border-blue-300 text-lg">
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button onclick="findPrimes()" class="flex-[1.5] bg-gradient-to-r from-[#2980b9] to-[#3498db] hover:from-[#3498db] hover:to-[#2980b9] text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-blue-500/30 transform active:scale-95 transition-all duration-200">
                            ค้นหา
                        </button>
                        <button onclick="clearForm()" class="flex-1 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3.5 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            ล้างข้อมูล
                        </button>
                    </div>

                    <div id="resultArea" class="mt-8 p-6 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl border-l-4 border-blue-500 shadow-sm hidden animate-fade-up">
                        <p class="text-sm font-medium text-blue-800 mb-2">จำนวนเฉพาะที่พบ:</p>
                        <div id="primeList" class="text-blue-700 font-mono font-bold text-lg break-words leading-relaxed"></div>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-gradient-to-br from-[#ff7675] to-[#fab1a0] p-8 md:p-12 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                <div class="relative z-10 text-center md:text-left">
                    <div class="inline-block bg-white/20 text-white font-semibold px-4 py-1.5 rounded-full text-sm mb-6 backdrop-blur-sm border border-white/30 shadow-sm">
                        Prime Numbers
                    </div>
                    <h3 class="text-3xl font-extrabold mb-4 drop-shadow-md">รายละเอียดโจทย์</h3>
                    <p class="mb-8 text-white/90 font-light leading-relaxed">
                        กรอก <strong>ช่วงเริ่มต้น</strong> และ <strong>ช่วงสิ้นสุด</strong> เพื่อตรวจสอบและแสดง <strong>จำนวนเฉพาะ (Prime Number)</strong> ที่อยู่ในช่วงนั้นทั้งหมด
                    </p>
                    
                    <div class="space-y-4 text-sm opacity-95 text-left">
                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-base mb-3 text-red-100">✨ เงื่อนไขการคำนวณ</h4>
                            <ul class="space-y-3 list-none ml-0">
                                <li class="flex gap-2 items-start"><span class="text-lg">📌</span> ตัวเลขเฉพาะต้อง <strong>ไม่มีตัวหารอื่น</strong> ลงตัวนอกจาก 1 และตัวมันเอง</li>
                                <li class="flex gap-2 items-start"><span class="text-lg">🔁</span> โปรแกรมจะ <strong>วนซ้ำ (Loop)</strong> ตรวจสอบตัวเลขในวันที่กำหนดทั้งหมด</li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center py-6 text-gray-400 text-sm font-light">
        © 2024 ข้อสอบกลางภาค สงวนลิขสิทธิ์ เบญญาพร ศรีทา
    </footer>

    <script>
        function isPrime(num) {
            if (num <= 1) return false;
            for (let i = 2; i <= Math.sqrt(num); i++) {
                if (num % i === 0) return false;
            }
            return true;
        }

        function findPrimes() {
            const start = parseInt(document.getElementById('startInput').value);
            const end = parseInt(document.getElementById('endInput').value);
            const resultArea = document.getElementById('resultArea');
            const primeList = document.getElementById('primeList');

            if (isNaN(start) || isNaN(end)) {
                alert("กรุณากรอกตัวเลขให้ครบถ้วน");
                return;
            }

            let primes = [];
            for (let i = Math.min(start, end); i <= Math.max(start, end); i++) {
                if (isPrime(i)) {
                    primes.push(i);
                }
            }

            resultArea.classList.remove('hidden');
            resultArea.classList.add('animate-fade-up');
            
            if (primes.length > 0) {
                primeList.innerHTML = primes.map(p => `<span class="inline-block bg-white/60 px-2 py-1 m-1 rounded border border-blue-200 shadow-sm">${p}</span>`).join('');
            } else {
                primeList.innerText = "ไม่พบจำนวนเฉพาะในช่วงนี้";
            }
        }

        function clearForm() {
            document.getElementById('startInput').value = "";
            document.getElementById('endInput').value = "";
            const resultArea = document.getElementById('resultArea');
            resultArea.classList.add('hidden');
            resultArea.classList.remove('animate-fade-up');
            document.getElementById('primeList').innerText = "";
        }
    </script>
</body>
</html>