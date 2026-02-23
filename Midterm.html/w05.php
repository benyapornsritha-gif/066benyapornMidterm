<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.5 คำนวณค่าบริการอินเทอร์เน็ต</title>
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
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-1.5 rounded-lg shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide">สอบกลางภาค</span>
            </div>
            <div class="hidden md:flex gap-8 text-sm font-medium items-center">
                <a href="#" class="text-gray-300 hover:text-white transition">คำอธิบาย</a>
                <a href="#" class="text-indigo-400 font-semibold border-b-2 border-indigo-400 pb-1">การเขียนโปรแกรมแบบมีเงื่อนไข ▾</a>
                <a href="#" class="text-gray-300 hover:text-white transition">เขียนโปรแกรมวนซ้ำ ▾</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto flex justify-center items-center py-12 px-4 relative">
        <div class="absolute top-10 right-20 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>
        <div class="absolute bottom-10 left-20 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>

        <div class="max-w-5xl w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row border border-gray-100 relative z-10">
            
            <div class="flex-1 p-8 md:p-12 relative">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">1.5</span>
                    ค่าบริการอินเทอร์เน็ต
                </h2>
                
                <div class="space-y-6 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-indigo-600 transition-colors">จำนวนชั่วโมงใช้งาน</label>
                        <input type="number" id="hours" placeholder="กรอกจำนวนชั่วโมง" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm hover:border-indigo-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-indigo-600 transition-colors">แพ็กเกจอินเทอร์เน็ต</label>
                        <select id="package" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm hover:border-indigo-300 cursor-pointer appearance-none">
                            <option value="basic">🟢 แพ็กเกจ Basic</option>
                            <option value="premium">👑 แพ็กเกจ Premium</option>
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button onclick="calculateInternet()" class="flex-[1.5] bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-indigo-500/30 transform active:scale-95 transition-all duration-200">
                            คำนวณค่าบริการ
                        </button>
                        <button onclick="clearForm()" class="flex-1 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3.5 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            เคลียร์ข้อมูล
                        </button>
                    </div>

                    <div id="result" class="mt-8 p-6 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl border-l-4 border-indigo-500 shadow-sm hidden animate-fade-up">
                        <p class="text-sm font-medium text-indigo-700 mb-2">สรุปค่าบริการทั้งหมดที่ต้องชำระ:</p>
                        <p id="totalCharge" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600"></p>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-gradient-to-br from-[#ff5f6d] to-[#ffc371] p-8 md:p-12 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                <div class="relative z-10">
                    <h3 class="text-3xl font-extrabold mb-2 drop-shadow-md">รายละเอียดแพ็กเกจ</h3>
                    <p class="text-sm mb-8 text-white/80 font-light">เลือกแพ็กเกจและกรอกจำนวนชั่วโมงเพื่อคำนวณ</p>
                    
                    <div class="space-y-6 text-sm opacity-95">
                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-lg mb-3 flex items-center gap-2">🟢 แพ็กเกจ Basic</h4>
                            <ul class="space-y-2 ml-1 text-white/90">
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>0 - 20 ชั่วโมง</span> <span class="font-semibold">10 บาท/ชม.</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>21 - 50 ชั่วโมง</span> <span class="font-semibold">8 บาท/ชม.</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>มากกว่า 50 ชั่วโมง</span> <span class="font-semibold">5 บาท/ชม.</span></li>
                                <li class="flex justify-between text-yellow-200 mt-2"><span>ค่าบริการคงที่</span> <span class="font-bold">100 บาท</span></li>
                            </ul>
                        </section>

                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-lg mb-3 flex items-center gap-2">👑 แพ็กเกจ Premium</h4>
                            <ul class="space-y-2 ml-1 text-white/90">
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>0 - 20 ชั่วโมง</span> <span class="font-semibold">15 บาท/ชม.</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>21 - 50 ชั่วโมง</span> <span class="font-semibold">12 บาท/ชม.</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>มากกว่า 50 ชั่วโมง</span> <span class="font-semibold">10 บาท/ชม.</span></li>
                                <li class="flex justify-between text-yellow-200 mt-2"><span>ค่าบริการคงที่</span> <span class="font-bold">200 บาท</span></li>
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
        function calculateInternet() {
            const hours = parseFloat(document.getElementById('hours').value);
            const pkg = document.getElementById('package').value;
            const resultDiv = document.getElementById('result');
            const totalChargeP = document.getElementById('totalCharge');

            if (isNaN(hours) || hours < 0) {
                alert("กรุณากรอกจำนวนชั่วโมงให้ถูกต้อง");
                return;
            }

            let hourlyRate = 0;
            let fixedCharge = 0;

            if (pkg === 'basic') {
                fixedCharge = 100;
                if (hours <= 20) hourlyRate = 10;
                else if (hours <= 50) hourlyRate = 8;
                else hourlyRate = 5;
            } else { // premium
                fixedCharge = 200;
                if (hours <= 20) hourlyRate = 15;
                else if (hours <= 50) hourlyRate = 12;
                else hourlyRate = 10;
            }

            const total = (hours * hourlyRate) + fixedCharge;

            resultDiv.classList.remove('hidden');
            resultDiv.classList.add('animate-fade-up');
            totalChargeP.innerText = total.toLocaleString() + " บาท";
        }

        function clearForm() {
            document.getElementById('hours').value = '';
            document.getElementById('package').selectedIndex = 0;
            const resultDiv = document.getElementById('result');
            resultDiv.classList.add('hidden');
            resultDiv.classList.remove('animate-fade-up');
        }
    </script>
</body>
</html>