<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.3 คำนวณค่าไฟฟ้า</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            -webkit-font-smoothing: antialiased;
        }
        /* อนิเมชันสำหรับกล่องผลลัพธ์ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            animation: fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        /* ปรับแต่ง Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-gray-100 min-h-screen flex flex-col">

    <nav class="bg-[#0f172a]/90 backdrop-blur-md text-white py-4 px-6 flex justify-between items-center shadow-md sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3 cursor-pointer hover:opacity-80 transition">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-1.5 rounded-lg shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide">สอบกลางภาค</span>
            </div>
            <div class="hidden md:flex gap-8 text-sm font-medium items-center">
                <a href="#" class="text-gray-300 hover:text-white transition">คำอธิบาย</a>
                <a href="#" class="text-blue-400 font-semibold border-b-2 border-blue-400 pb-1">การเขียนโปรแกรมแบบมีเงื่อนไข ▾</a>
                <a href="#" class="text-gray-300 hover:text-white transition">เขียนโปรแกรมวนซ้ำ ▾</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto flex justify-center items-center py-12 px-4 relative">
        
        <div class="absolute top-10 right-20 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>
        <div class="absolute bottom-10 left-20 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>

        <div class="max-w-5xl w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row border border-gray-100 relative z-10">
            
            <div class="flex-1 p-8 md:p-12 relative">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">1.3</span>
                    คำนวณค่าไฟฟ้า
                </h2>
                
                <div class="space-y-6 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">จำนวนหน่วยไฟฟ้า</label>
                        <input type="number" id="units" placeholder="กรอกจำนวนหน่วยที่ใช้" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">ประเภทผู้ใช้ไฟฟ้า</label>
                        <select id="userType" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300 cursor-pointer appearance-none">
                            <option value="home">🏠 บ้านอยู่อาศัย</option>
                            <option value="business">🏪 ร้านค้า/ธุรกิจ</option>
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button onclick="calculateElectric()" class="flex-[1.5] bg-gradient-to-r from-[#e91e63] to-pink-500 hover:from-[#d81b60] hover:to-pink-600 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-pink-500/30 transform active:scale-95 transition-all duration-200">
                            คำนวณค่าไฟ
                        </button>
                        <button onclick="clearForm()" class="flex-1 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3.5 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            เคลียร์ข้อมูล
                        </button>
                    </div>

                    <div id="result" class="mt-8 p-6 bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl border-l-4 border-green-500 shadow-sm hidden animate-fade-up">
                        <div class="space-y-2 text-gray-700">
                            <p class="text-sm flex justify-between border-b border-green-200/50 pb-2">
                                <span class="font-medium text-green-700">ประเภทผู้ใช้:</span> 
                                <span id="resUserType" class="font-bold"></span>
                            </p>
                            <p class="text-sm flex justify-between border-b border-green-200/50 pb-2">
                                <span class="font-medium text-green-700">จำนวนหน่วยที่ใช้:</span> 
                                <span><span id="resUnits" class="font-bold"></span> หน่วย</span>
                            </p>
                            <div class="pt-2">
                                <p class="text-sm font-medium text-green-700 mb-1">ยอดที่ต้องชำระสุทธิ:</p>
                                <p class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-500">
                                    <span id="totalPrice"></span> <span class="text-lg text-green-600 font-semibold">บาท</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-gradient-to-br from-[#ff6b6b] to-[#ff8e53] p-8 md:p-12 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="inline-block bg-white/20 text-white font-semibold px-4 py-1.5 rounded-full text-sm mb-6 backdrop-blur-sm border border-white/30 shadow-sm">
                        อัตราก้าวหน้า (Progressive Rate)
                    </div>
                    <h3 class="text-3xl font-extrabold mb-8 drop-shadow-md leading-tight">เงื่อนไข<br>การคำนวณค่าไฟ</h3>
                    
                    <div class="space-y-6 text-sm opacity-95">
                        
                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-lg mb-3 flex items-center gap-2">
                                🏠 บ้านอยู่อาศัย
                            </h4>
                            <ul class="space-y-2 ml-1 text-white/90">
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>0 - 100 หน่วย</span> <span class="font-semibold">3 บาท/หน่วย</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>101 - 200 หน่วย</span> <span class="font-semibold">4 บาท/หน่วย</span></li>
                                <li class="flex justify-between"><span>มากกว่า 200 หน่วย</span> <span class="font-semibold">5 บาท/หน่วย</span></li>
                            </ul>
                        </section>

                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-lg mb-3 flex items-center gap-2">
                                🏪 ร้านค้า/ธุรกิจ
                            </h4>
                            <ul class="space-y-2 ml-1 text-white/90">
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>0 - 100 หน่วย</span> <span class="font-semibold">4 บาท/หน่วย</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>101 - 200 หน่วย</span> <span class="font-semibold">5 บาท/หน่วย</span></li>
                                <li class="flex justify-between"><span>มากกว่า 200 หน่วย</span> <span class="font-semibold">6 บาท/หน่วย</span></li>
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
        function calculateElectric() {
            const unitsInput = document.getElementById('units');
            const units = parseFloat(unitsInput.value);
            const userType = document.getElementById('userType').value;
            const resultDiv = document.getElementById('result');
            
            if (isNaN(units) || units < 0) {
                alert("กรุณากรอกจำนวนหน่วยไฟฟ้าให้ถูกต้อง");
                return;
            }

            let total = 0;
            let typeLabel = (userType === 'home') ? "บ้านอยู่อาศัย" : "ร้านค้า/ธุรกิจ";

            // การคำนวณแบบก้าวหน้า (Progressive Rate) ตามโจทย์
            if (userType === 'home') {
                if (units <= 100) {
                    total = units * 3;
                } else if (units <= 200) {
                    total = (100 * 3) + ((units - 100) * 4);
                } else {
                    total = (100 * 3) + (100 * 4) + ((units - 200) * 5);
                }
            } else {
                if (units <= 100) {
                    total = units * 4;
                } else if (units <= 200) {
                    total = (100 * 4) + ((units - 100) * 5);
                } else {
                    total = (100 * 4) + (100 * 5) + ((units - 200) * 6);
                }
            }

            // แสดงผลลัพธ์
            resultDiv.classList.remove('hidden');
            document.getElementById('resUserType').innerText = typeLabel;
            document.getElementById('resUnits').innerText = units.toLocaleString();
            document.getElementById('totalPrice').innerText = total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
        }

        function clearForm() {
            document.getElementById('units').value = '';
            document.getElementById('userType').selectedIndex = 0;
            document.getElementById('result').classList.add('hidden');
        }
    </script>
</body>
</html>