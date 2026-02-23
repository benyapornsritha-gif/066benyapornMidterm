<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1.1 คำนวณเงินเดือนพนักงาน</title>
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

    <nav class="bg-[#0f172a]/90 backdrop-blur-md text-white p-4 sticky top-0 z-50 shadow-md border-b border-white/10">
        <div class="container mx-auto flex justify-between items-center px-2 md:px-6">
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

    <div class="flex-grow flex justify-center items-center py-12 px-4 relative">
        
        <div class="absolute top-10 left-10 w-64 h-64 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob hidden md:block"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob hidden md:block"></div>

        <div class="flex flex-col md:flex-row bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden max-w-5xl w-full border border-gray-100 relative z-10">
            
            <div class="p-8 md:p-12 flex-1 relative">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">1.1</span>
                    คำนวณเงินเดือน
                </h2>
                
                <div class="space-y-5 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">ชื่อพนักงาน</label>
                        <input type="text" id="name" placeholder="กรอกชื่อ-นามสกุลพนักงาน" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">จำนวนชั่วโมงทำงาน (ต่อเดือน)</label>
                        <input type="number" id="hours" placeholder="เช่น 170" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-pink-600 transition-colors">ตำแหน่งพนักงาน</label>
                        <select id="position" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 text-gray-700 focus:bg-white focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all outline-none shadow-sm hover:border-pink-300 cursor-pointer appearance-none">
                            <option value="100">พนักงานระดับปฏิบัติการ (100 บ./ชม.)</option>
                            <option value="200">พนักงานระดับหัวหน้างาน (200 บ./ชม.)</option>
                            <option value="300">พนักงานระดับผู้จัดการ (300 บ./ชม.)</option>
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-10">
                        <button onclick="calculateSalary()" class="flex-1 bg-gradient-to-r from-[#e94d8d] to-pink-500 hover:from-[#d43d7a] hover:to-pink-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-pink-500/30 transform active:scale-95 transition-all duration-200">
                            คำนวณเงินเดือน
                        </button>
                        <button onclick="clearForm()" class="sm:w-1/3 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            เคลียร์ข้อมูล
                        </button>
                    </div>

                    <div id="result" class="mt-8 p-6 bg-gradient-to-r from-pink-50 to-rose-50 rounded-2xl border-l-4 border-pink-500 shadow-sm hidden">
                        </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-[#ff7e5f] to-[#feb47b] p-8 md:p-12 flex-1 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>
                
                <div class="relative z-10">
                    <div class="inline-block bg-white/20 text-white font-semibold px-4 py-1.5 rounded-full text-sm mb-6 backdrop-blur-sm border border-white/30 shadow-sm">
                        เงื่อนไขโจทย์
                    </div>
                    <h2 class="text-3xl font-extrabold mb-6 drop-shadow-md leading-tight">โปรแกรม<br>คำนวณเงินเดือน</h2>
                    
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 md:p-8 border border-white/20 shadow-xl">
                        <p class="mb-5 text-sm md:text-base leading-relaxed text-orange-50 font-light">
                            ให้เขียนโปรแกรมที่รับค่า <span class="bg-white/20 px-2 py-0.5 rounded">ชื่อพนักงาน</span> <span class="bg-white/20 px-2 py-0.5 rounded">ชั่วโมงทำงาน</span> และ <span class="bg-white/20 px-2 py-0.5 rounded">ตำแหน่ง</span> โดยมีเงื่อนไขดังนี้:
                        </p>
                        <ul class="space-y-4 text-sm md:text-base font-light">
                            <li class="flex items-start gap-3 bg-white/5 p-3 rounded-lg border border-white/10">
                                <span class="bg-white/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 text-xs mt-0.5">1</span>
                                <span><strong class="font-medium text-white">ปฏิบัติการ:</strong> ชั่วโมงละ 100 บาท</span>
                            </li>
                            <li class="flex items-start gap-3 bg-white/5 p-3 rounded-lg border border-white/10">
                                <span class="bg-white/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 text-xs mt-0.5">2</span>
                                <span><strong class="font-medium text-white">หัวหน้างาน:</strong> ชั่วโมงละ 200 บาท</span>
                            </li>
                            <li class="flex items-start gap-3 bg-white/5 p-3 rounded-lg border border-white/10">
                                <span class="bg-white/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 text-xs mt-0.5">3</span>
                                <span><strong class="font-medium text-white">ผู้จัดการ:</strong> ชั่วโมงละ 300 บาท</span>
                            </li>
                            <li class="flex items-start gap-3 bg-[#e94d8d]/30 p-3 rounded-lg border border-pink-400/30">
                                <span class="text-pink-300 flex-shrink-0 mt-0.5">⭐</span>
                                <span>ถ้าชั่วโมงทำงาน <strong class="font-medium text-white">เกิน 160 ชั่วโมง</strong> ให้เพิ่มเงินพิเศษ <strong class="font-medium text-white">1.5 เท่า</strong> สำหรับชั่วโมงที่เกิน</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateSalary() {
            const name = document.getElementById('name').value;
            const hours = parseFloat(document.getElementById('hours').value);
            const rate = parseFloat(document.getElementById('position').value);
            const resultDiv = document.getElementById('result');

            if (!name || isNaN(hours)) {
                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                return;
            }

            let totalSalary = 0;
            let overtimeHours = 0;

            if (hours <= 160) {
                totalSalary = hours * rate;
            } else {
                overtimeHours = hours - 160;
                // 160 ชม. แรกได้เรตปกติ + ชม. ที่เกินได้เรต 1.5 เท่า
                totalSalary = (160 * rate) + (overtimeHours * rate * 1.5);
            }

            // แสดงผลลัพธ์และเพิ่มคลาสเพื่อให้เล่นอนิเมชัน
            resultDiv.classList.remove('hidden');
            resultDiv.classList.add('animate-fade-up');
            
            resultDiv.innerHTML = `
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-pink-100 p-2 rounded-full text-pink-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="font-bold text-gray-800 text-lg">คุณ ${name}</p>
                </div>
                <div class="pl-12">
                    <p class="text-gray-600 font-medium mb-1">เงินเดือนสุทธิที่คุณจะได้รับ:</p>
                    <p class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-500">${totalSalary.toLocaleString()} <span class="text-lg text-pink-500 font-semibold">บาท</span></p>
                    ${overtimeHours > 0 ? `<p class="text-sm font-medium text-green-600 mt-2 bg-green-100/50 inline-block px-3 py-1 rounded-full border border-green-200">✨ รวมค่าล่วงเวลา ${overtimeHours} ชม. แล้ว</p>` : ''}
                </div>
            `;
        }

        function clearForm() {
            document.getElementById('name').value = '';
            document.getElementById('hours').value = '';
            document.getElementById('position').selectedIndex = 0;
            const resultDiv = document.getElementById('result');
            resultDiv.classList.add('hidden');
            resultDiv.classList.remove('animate-fade-up');
        }
    </script>
</body>
</html>