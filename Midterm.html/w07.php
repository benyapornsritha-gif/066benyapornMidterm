<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.1 คำนวณผลรวมเลขคู่</title>
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
                <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 p-1.5 rounded-lg shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide">สอบกลางภาค</span>
            </div>
            <div class="hidden md:flex gap-8 text-sm font-medium items-center">
                <a href="#" class="text-gray-300 hover:text-white transition">คำอธิบาย</a>
                <a href="#" class="text-gray-300 hover:text-white transition">การเขียนโปรแกรมแบบมีเงื่อนไข ▾</a>
                <a href="#" class="text-indigo-400 font-semibold border-b-2 border-indigo-400 pb-1">เขียนโปรแกรมวนซ้ำ ▾</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto flex justify-center items-center py-12 px-4 relative">
        <div class="absolute top-10 right-20 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>
        <div class="absolute bottom-10 left-20 w-72 h-72 bg-rose-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>

        <div class="max-w-4xl w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row border border-gray-100 relative z-10 min-h-[400px]">
            
            <div class="flex-1 p-8 md:p-12 relative flex flex-col justify-center">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">2.1</span>
                    คำนวณผลรวมเลขคู่
                </h2>
                
                <div class="space-y-6 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-indigo-600 transition-colors">กรอกจำนวนเต็มบวก (n)</label>
                        <input type="number" id="nValue" placeholder="กรอกค่า n เช่น 10" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm hover:border-indigo-300 text-lg">
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button onclick="calculateSum()" class="flex-[1.5] bg-gradient-to-r from-[#6c5ce7] to-[#5849d1] hover:from-[#5849d1] hover:to-[#4a3ab8] text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-indigo-500/30 transform active:scale-95 transition-all duration-200">
                            คำนวณผลรวม
                        </button>
                        <button onclick="clearResult()" class="flex-1 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3.5 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            ล้างข้อมูล
                        </button>
                    </div>

                    <div id="resultBox" class="mt-8 p-6 bg-gradient-to-r from-indigo-50 to-blue-50 rounded-2xl border-l-4 border-indigo-500 shadow-sm hidden animate-fade-up">
                        <p class="text-sm font-medium text-indigo-700 mb-1">ผลรวมของเลขคู่ทั้งหมดคือ:</p>
                        <p id="sumResult" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-600"></p>
                        <p id="sumProcess" class="text-xs text-gray-500 mt-3 font-mono break-words leading-relaxed bg-white/60 p-2 rounded-lg border border-indigo-100"></p>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-gradient-to-br from-[#ff7675] to-[#fd79a8] p-8 md:p-12 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="inline-block bg-white/20 text-white font-semibold px-4 py-1.5 rounded-full text-sm mb-6 backdrop-blur-sm border border-white/30 shadow-sm">
                        Looping Concept
                    </div>
                    <h3 class="text-3xl font-extrabold mb-4 drop-shadow-md">รายละเอียดโจทย์</h3>
                    <p class="mb-8 text-white/90 font-light leading-relaxed">
                        กรอกค่า <strong>n</strong> (จำนวนเต็มบวก) เพื่อคำนวณผลรวมของเลขคู่ ตั้งแต่ <strong class="text-yellow-200 text-lg">1 ถึง n</strong>
                    </p>
                    
                    <div class="space-y-4 text-sm opacity-95">
                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-base mb-3 text-yellow-100">✨ เงื่อนไขการคำนวณ</h4>
                            <ul class="space-y-3 list-none ml-0">
                                <li class="flex gap-2 items-start"><span class="bg-white/20 rounded-full w-5 h-5 flex items-center justify-center text-xs flex-shrink-0">1</span> ตัวเลขที่นำมาบวกต้องเป็นเลขคู่เท่านั้น</li>
                                <li class="flex gap-2 items-start"><span class="bg-white/20 rounded-full w-5 h-5 flex items-center justify-center text-xs flex-shrink-0">2</span> คำนวณผลรวมด้วยการวนลูปตั้งแต่ 1 ถึงค่าของ n</li>
                                <li class="flex gap-2 items-start"><span class="bg-white/20 rounded-full w-5 h-5 flex items-center justify-center text-xs flex-shrink-0">3</span> แสดงผลลัพธ์พร้อมทั้งวิธีคิด (ตัวเลขที่นำมาบวก)</li>
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
        function calculateSum() {
            const n = parseInt(document.getElementById('nValue').value);
            const resultBox = document.getElementById('resultBox');
            const sumResult = document.getElementById('sumResult');
            const sumProcess = document.getElementById('sumProcess');

            if (isNaN(n) || n < 1) {
                alert("กรุณากรอกจำนวนเต็มบวกที่มากกว่า 0 ครับ");
                return;
            }

            let sum = 0;
            let evens = [];

            for (let i = 1; i <= n; i++) {
                if (i % 2 === 0) {
                    sum += i;
                    evens.push(i);
                }
            }

            resultBox.classList.remove('hidden');
            resultBox.classList.add('animate-fade-up');
            
            sumResult.innerText = sum.toLocaleString();
            sumProcess.innerText = evens.length > 0 
                ? `(ตัวเลขที่บวก: ${evens.join(' + ')})` 
                : "ไม่มีเลขคู่ในช่วงนี้";
        }

        function clearResult() {
            document.getElementById('nValue').value = "";
            const resultBox = document.getElementById('resultBox');
            resultBox.classList.add('hidden');
            resultBox.classList.remove('animate-fade-up');
        }
    </script>
</body>
</html>