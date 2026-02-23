<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.2 คำนวณภาษีรถยนต์</title>
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
        
        <div class="absolute top-10 right-20 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>
        <div class="absolute bottom-10 left-20 w-72 h-72 bg-rose-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>

        <div class="max-w-5xl w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row border border-gray-100 relative z-10">
            
            <div class="flex-1 p-8 md:p-12 relative">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">1.2</span>
                    คำนวณภาษีรถยนต์
                </h2>
                
                <div class="space-y-5 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">ขนาด CC ของรถยนต์</label>
                        <input type="number" id="cc" placeholder="เช่น 1500" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">ประเภทของรถยนต์</label>
                        <select id="carType" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300 cursor-pointer appearance-none">
                            <option value="personal">🚗 รถยนต์ส่วนบุคคล</option>
                            <option value="truck">🛻 รถกระบะ</option>
                        </select>
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">อายุของรถยนต์ (ปี)</label>
                        <input type="number" id="age" placeholder="เช่น 6" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300">
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button onclick="calculateTax()" class="flex-1 bg-gradient-to-r from-[#e91e63] to-pink-500 hover:from-[#d81b60] hover:to-pink-600 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-pink-500/30 transform active:scale-95 transition-all duration-200">
                            คำนวณภาษี
                        </button>
                        <button onclick="clearForm()" class="sm:w-1/3 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3.5 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            เคลียร์ข้อมูล
                        </button>
                    </div>

                    <div id="result" class="mt-8 p-6 bg-gradient-to-r from-pink-50 to-rose-50 rounded-2xl border-l-4 border-pink-500 shadow-sm hidden animate-fade-up">
                        <p class="text-sm font-medium text-pink-600 mb-1 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            ผลการคำนวณภาษีสุทธิ
                        </p>
                        <p id="taxValue" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-500 mt-2"></p>
                        <p id="discountLabel" class="inline-block mt-3 text-sm font-medium text-green-700 bg-green-100/60 px-3 py-1.5 rounded-full border border-green-200"></p>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-gradient-to-br from-[#ff6b6b] to-[#f06595] p-8 md:p-12 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="inline-block bg-white/20 text-white font-semibold px-4 py-1.5 rounded-full text-sm mb-6 backdrop-blur-sm border border-white/30 shadow-sm">
                        อัตราภาษีป้ายทะเบียน
                    </div>
                    <h3 class="text-3xl font-extrabold mb-8 drop-shadow-md leading-tight">โปรแกรม<br>คำนวณภาษีรถยนต์</h3>
                    
                    <div class="space-y-6 text-sm opacity-95">
                        
                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-lg mb-3 flex items-center gap-2">
                                🚗 รถยนต์ส่วนบุคคล
                            </h4>
                            <ul class="space-y-2 ml-1 text-white/90">
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>CC ไม่เกิน 1,500</span> <span class="font-semibold">500 บาท</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>CC 1,501 - 2,000</span> <span class="font-semibold">1,000 บาท</span></li>
                                <li class="flex justify-between"><span>CC มากกว่า 2,000</span> <span class="font-semibold">1,500 บาท</span></li>
                            </ul>
                        </section>

                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-lg mb-3 flex items-center gap-2">
                                🛻 รถกระบะ
                            </h4>
                            <ul class="space-y-2 ml-1 text-white/90">
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>CC ไม่เกิน 1,500</span> <span class="font-semibold">400 บาท</span></li>
                                <li class="flex justify-between border-b border-white/10 pb-1"><span>CC 1,501 - 2,000</span> <span class="font-semibold">800 บาท</span></li>
                                <li class="flex justify-between"><span>CC มากกว่า 2,000</span> <span class="font-semibold">1,200 บาท</span></li>
                            </ul>
                        </section>

                        <section class="bg-gradient-to-r from-yellow-400/20 to-yellow-500/20 p-4 rounded-xl backdrop-blur-sm border border-yellow-300/30">
                            <h4 class="font-bold text-base mb-2 text-yellow-100">✨ ส่วนลดตามอายุรถยนต์</h4>
                            <ul class="space-y-1.5 text-white">
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 bg-yellow-300 rounded-full"></span>
                                    อายุมากกว่า 5 ปี: <strong class="text-yellow-200">ลด 10%</strong>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 bg-yellow-300 rounded-full"></span>
                                    อายุมากกว่า 10 ปี: <strong class="text-yellow-200">ลด 20%</strong>
                                </li>
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
        function calculateTax() {
            const cc = parseFloat(document.getElementById('cc').value);
            const carType = document.getElementById('carType').value;
            const age = parseFloat(document.getElementById('age').value);
            const resultDiv = document.getElementById('result');
            const taxValue = document.getElementById('taxValue');
            const discountLabel = document.getElementById('discountLabel');

            if (isNaN(cc) || isNaN(age)) {
                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                return;
            }

            let baseTax = 0;

            // คำนวณตามประเภทรถ
            if (carType === 'personal') {
                if (cc <= 1500) baseTax = 500;
                else if (cc <= 2000) baseTax = 1000;
                else baseTax = 1500;
            } else {
                if (cc <= 1500) baseTax = 400;
                else if (cc <= 2000) baseTax = 800;
                else baseTax = 1200;
            }

            // คำนวณส่วนลดตามอายุ
            let discountRate = 0;
            if (age > 10) discountRate = 0.20;
            else if (age > 5) discountRate = 0.10;

            const finalTax = baseTax * (1 - discountRate);

            // แสดงผลลัพธ์
            resultDiv.classList.remove('hidden');
            taxValue.innerText = finalTax.toLocaleString() + ' บาท';
            discountLabel.innerText = discountRate > 0 
                ? `(ได้รับส่วนลดอายุรถ ${discountRate * 100}% จากราคาปกติ ${baseTax} บาท)` 
                : 'ไม่มีส่วนลดอายุรถ';
        }

        function clearForm() {
            document.getElementById('cc').value = '';
            document.getElementById('age').value = '';
            document.getElementById('carType').selectedIndex = 0;
            document.getElementById('result').classList.add('hidden');
        }
    </script>
</body>
</html>