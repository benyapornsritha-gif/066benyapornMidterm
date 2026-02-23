<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.4 คำนวณค่าแรงพนักงาน</title>
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
        
        <div class="absolute top-10 right-20 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>
        <div class="absolute bottom-10 left-20 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>

        <div class="max-w-5xl w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row border border-gray-100 relative z-10">
            
            <div class="flex-1 p-8 md:p-12 relative">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">1.4</span>
                    คำนวณค่าแรงพนักงาน
                </h2>
                
                <div class="space-y-6 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-blue-600 transition-colors">จำนวนชั่วโมงทำงาน</label>
                        <input type="number" id="hours" placeholder="กรอกจำนวนชั่วโมงทำงาน" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none shadow-sm hover:border-blue-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-blue-600 transition-colors">ประเภทงาน</label>
                        <select id="jobType" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none shadow-sm hover:border-blue-300 cursor-pointer appearance-none">
                            <option value="50">📝 งานทั่วไป (50 บ./ชม.)</option>
                            <option value="100">⭐ งานพิเศษ (100 บ./ชม.)</option>
                            <option value="150">🚀 งานเร่งด่วน (150 บ./ชม.)</option>
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button onclick="calculateWage()" class="flex-[1.5] bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-blue-500/30 transform active:scale-95 transition-all duration-200">
                            คำนวณค่าแรง
                        </button>
                        <button onclick="clearForm()" class="flex-1 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3.5 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            เคลียร์ข้อมูล
                        </button>
                    </div>

                    <div id="result" class="mt-8 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl border-l-4 border-blue-500 shadow-sm hidden animate-fade-up">
                        <p class="text-sm font-medium text-blue-700 mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                            รายได้สุทธิที่พนักงานจะได้รับ:
                        </p>
                        <p id="totalWage" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600"></p>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-gradient-to-br from-[#ff5f6d] to-[#ffc371] p-8 md:p-12 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="inline-block bg-white/20 text-white font-semibold px-4 py-1.5 rounded-full text-sm mb-6 backdrop-blur-sm border border-white/30 shadow-sm">
                        อัตราค่าจ้าง & OT
                    </div>
                    <h3 class="text-3xl font-extrabold mb-8 drop-shadow-md leading-tight">เงื่อนไข<br>การคำนวณค่าแรง</h3>
                    
                    <div class="space-y-4 text-sm opacity-95">
                        
                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg mb-6">
                            <ul class="space-y-3 text-white/90">
                                <li class="flex items-center gap-3 border-b border-white/10 pb-2">
                                    <span class="bg-white/20 w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-lg">📝</span>
                                    <div><strong class="block text-white">งานทั่วไป</strong> 50 บาท / ชั่วโมง</div>
                                </li>
                                <li class="flex items-center gap-3 border-b border-white/10 pb-2">
                                    <span class="bg-white/20 w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-lg">⭐</span>
                                    <div><strong class="block text-white">งานพิเศษ</strong> 100 บาท / ชั่วโมง</div>
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="bg-white/20 w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-lg">🚀</span>
                                    <div><strong class="block text-white">งานเร่งด่วน</strong> 150 บาท / ชั่วโมง</div>
                                </li>
                            </ul>
                        </section>

                        <section class="bg-gradient-to-r from-orange-500/30 to-red-500/30 p-4 rounded-xl backdrop-blur-sm border border-white/20 shadow-inner">
                            <p class="flex items-start gap-2 text-orange-50 font-light leading-relaxed">
                                <span class="text-xl">💡</span>
                                <span>ชั่วโมงที่ <strong>เกิน 8 ชั่วโมง</strong> คิดค่าล่วงเวลา (OT) ให้เป็น <strong class="text-white font-semibold">1.5 เท่า</strong> ของเรตประเภทงานนั้นๆ</span>
                            </p>
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
        function calculateWage() {
            const hours = parseFloat(document.getElementById('hours').value);
            const rate = parseFloat(document.getElementById('jobType').value);
            const resultDiv = document.getElementById('result');
            const totalWageP = document.getElementById('totalWage');

            if (isNaN(hours) || hours <= 0) {
                alert("กรุณากรอกจำนวนชั่วโมงทำงานให้ถูกต้อง");
                return;
            }

            let total = 0;
            if (hours <= 8) {
                total = hours * rate;
            } else {
                const normalHours = 8;
                const otHours = hours - 8;
                // คำนวณ 8 ชม. แรกในเรตปกติ + ชม. ที่เหลือในเรต 1.5 เท่า
                total = (normalHours * rate) + (otHours * rate * 1.5);
            }

            resultDiv.classList.remove('hidden');
            resultDiv.classList.add('animate-fade-up');
            totalWageP.innerText = total.toLocaleString() + " บาท";
        }

        function clearForm() {
            document.getElementById('hours').value = '';
            document.getElementById('jobType').selectedIndex = 0;
            const resultDiv = document.getElementById('result');
            resultDiv.classList.add('hidden');
            resultDiv.classList.remove('animate-fade-up');
        }
    </script>
</body>
</html>