<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำอธิบายการสอบกลางภาค</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            -webkit-font-smoothing: antialiased;
        }
        /* ปรับสีพื้นหลังให้ดูมีมิติและทันสมัยขึ้น */
        .bg-gradient-custom {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #172554 100%);
            background-size: 200% 200%;
            animation: gradientMove 15s ease infinite;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* ปรับ Dropdown ให้สมูทขึ้น ไม่กระตุก */
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: block !important; /* ยกเลิก class hidden ของเดิมเพื่อใช้ CSS transition */
        }
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* แต่ง Scrollbar ให้สวยงาม */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; 
        }
    </style>
</head>
<body class="bg-gradient-custom min-h-screen text-gray-800">

    <nav class="bg-[#0f172a]/80 backdrop-blur-md text-white p-4 sticky top-0 z-50 shadow-[0_4px_30px_rgba(0,0,0,0.1)] border-b border-white/10">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="flex items-center gap-3 cursor-pointer hover:opacity-80 transition">
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-2 rounded-xl shadow-lg shadow-blue-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide bg-clip-text text-transparent bg-gradient-to-r from-blue-100 to-white">สอบกลางภาค</span>
            </div>
            
            <div class="hidden md:flex gap-8 text-sm font-medium items-center">
                <a href="#" class="text-blue-400 font-semibold border-b-2 border-blue-400 pb-1">คำอธิบาย</a>
                
                <div class="relative dropdown group">
                    <a href="#" class="text-gray-300 hover:text-white transition-colors flex items-center gap-1 py-2">
                        การเขียนโปรแกรมแบบมีเงื่อนไข 
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180 duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div class="dropdown-menu absolute bg-[#1e293b]/95 backdrop-blur-xl text-white rounded-xl shadow-2xl w-56 mt-2 py-2 border border-white/10 overflow-hidden">
                        <a href="w01.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 1.1 (20 คะแนน)</a>
                        <a href="w02.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 1.2 (20 คะแนน)</a>
                        <a href="w03.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50 text-gray-300 text-sm">ข้อที่ 1.3 (10 คะแนน)</a>
                        <a href="w04.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50 text-gray-300 text-sm">ข้อที่ 1.4 (10 คะแนน)</a>
                        <a href="w05.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50 text-gray-300 text-sm">ข้อที่ 1.5 (10 คะแนน)</a>
                        <a href="w06.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all text-gray-300 text-sm">ข้อที่ 1.6 (10 คะแนน)</a>
                    </div>
                </div>

                <div class="relative dropdown group">
                    <a href="#" class="text-gray-300 hover:text-white transition-colors flex items-center gap-1 py-2">
                        เขียนโปรแกรมวนซ้ำ
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180 duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div class="dropdown-menu absolute bg-[#1e293b]/95 backdrop-blur-xl text-white rounded-xl shadow-2xl w-56 mt-2 py-2 border border-white/10 overflow-hidden">
                         <a href="w07.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 2.1 (10 คะแนน)</a>
                         <a href="w08.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 2.2 (10 คะแนน)</a>
                         <a href="w09.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 2.3 (10 คะแนน)</a>
                         <a href="w10.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 2.4 (10 คะแนน)</a>
                         <a href="w11.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 2.5 (10 คะแนน)</a>
                         <a href="w12.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all border-b border-gray-700/50">ข้อที่ 2.6 (20 คะแนน)</a>
                         <a href="w13.php" class="block px-4 py-2.5 hover:bg-blue-600/50 hover:pl-6 transition-all">ข้อที่ 2.7 (30 คะแนน)</a>  
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-12 px-4 relative z-10">
        <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] overflow-hidden max-w-5xl mx-auto border border-white/40 ring-1 ring-black/5">
            
            <div class="p-10 text-center border-b border-gray-100 bg-gradient-to-b from-white to-gray-50/50">
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#2e289b] to-[#19abea] mb-8 drop-shadow-sm">คำอธิบายการสอบกลางภาค</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                    <div class="space-y-3">
                        <p class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-pink-500"></span><span class="font-semibold text-gray-700">สอบกลางภาค:</span> <span class="text-gray-600">ภาคเรียนที่ 2/2567</span></p>
                        <p class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-pink-500"></span><span class="font-semibold text-gray-700">รหัสวิชา:</span> <span class="text-gray-600">31910-2011</span></p>
                        <p class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-pink-500"></span><span class="font-semibold text-gray-700">แผนกสาขาวิชา:</span> <span class="text-gray-600">เทคโนโลยีธุรกิจดิจิทัล</span></p>
                    </div>
                    <div class="space-y-3">
                        <p class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-blue-500"></span><span class="font-semibold text-gray-700">วิชา:</span> <span class="text-gray-600">การพัฒนาเว็บไซต์ทางธุรกิจ</span></p>
                        <p class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-blue-500"></span><span class="font-semibold text-gray-700">นักเรียน:</span> <span class="text-blue-600 font-bold bg-blue-50 px-3 py-1 rounded-full">เบญญาพร ศรีทา</span></p>
                        <p class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-blue-500"></span><span class="font-semibold text-gray-700">วิทยาลัย:</span> <span class="text-gray-600">วิทยาลัยเทคนิคสระบุรี</span></p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gradient-to-r from-pink-50 via-purple-50 to-blue-50 text-center border-b border-gray-100/50">
                <p class="text-gray-700 text-lg font-medium">
                    กรุณาเลือกทำข้อสอบตามหัวข้อด้านล่างตามลำดับ หรือเลือกทำเฉพาะข้อที่สนใจ
                </p>
                <div class="mt-3 inline-flex flex-wrap justify-center gap-2 text-sm bg-white/60 px-6 py-2 rounded-full shadow-sm border border-white">
                    โดยต้องเลือกทำ 
                    <span class="text-pink-600 font-bold flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        "การเขียนโปรแกรมแบบมีเงื่อนไข" ให้ได้ 20 คะแนน
                    </span> 
                    และ 
                    <span class="text-blue-600 font-bold flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        "การเขียนโปรแกรมแบบวนซ้ำ" 20 คะแนน
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-100 bg-white">
                
                <div class="p-8 hover:bg-pink-50/30 transition-colors duration-500">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-pink-400 to-pink-600 text-white w-10 h-10 flex items-center justify-center rounded-2xl shadow-lg shadow-pink-500/30">1</span>
                        ข้อที่ 1.1 - 1.6 <br><span class="text-base font-medium text-pink-600">การเขียนโปรแกรมแบบมีเงื่อนไข (20 คะแนน)</span>
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-pink-100 cursor-pointer">
                            <a href="w01.php" class="text-gray-600 group-hover:text-pink-600 font-medium group-hover:translate-x-2 transition-all duration-300 flex-1">1. คำนวณเงินเดือนพนักงาน</a>
                            <span class="text-xs bg-pink-100 text-pink-600 px-3 py-1.5 rounded-full font-bold shadow-sm">20 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-pink-100 cursor-pointer">
                            <a href="w02.php" class="text-gray-600 group-hover:text-pink-600 font-medium group-hover:translate-x-2 transition-all duration-300 flex-1">2. คำนวณภาษีรถยนต์</a>
                            <span class="text-xs bg-pink-100 text-pink-600 px-3 py-1.5 rounded-full font-bold shadow-sm">20 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-orange-100 cursor-pointer">
                            <a href="w03.php" class="text-gray-500 group-hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2 flex-1">3. คำนวณค่าไฟฟ้า</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-orange-100 cursor-pointer">
                            <a href="w04.php" class="text-gray-500 group-hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2 flex-1">4. คำนวณค่าแรงพนักงาน</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-orange-100 cursor-pointer">
                            <a href="w05.php" class="text-gray-500 group-hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2 flex-1">5. คำนวณค่าบริการอินเทอร์เน็ต</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-orange-100 cursor-pointer">
                            <a href="w06.php" class="text-gray-500 group-hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2 flex-1">6. เช็คเลขคู่หรือเลขคี่</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                    </ul>
                </div>

                <div class="p-8 hover:bg-blue-50/30 transition-colors duration-500">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="bg-gradient-to-br from-blue-400 to-blue-600 text-white w-10 h-10 flex items-center justify-center rounded-2xl shadow-lg shadow-blue-500/30">2</span>
                        ข้อที่ 2.1 - 2.7 <br><span class="text-base font-medium text-blue-600">การเขียนโปรแกรมแบบวนซ้ำ (20 คะแนน)</span>
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-blue-100 cursor-pointer">
                            <a href="w07.php" class="text-gray-500 group-hover:text-blue-500 transition-all duration-300 group-hover:translate-x-2 flex-1">1. คำนวณผลรวมเลขคู่</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-blue-100 cursor-pointer">
                            <a href="w08.php" class="text-gray-500 group-hover:text-blue-500 transition-all duration-300 group-hover:translate-x-2 flex-1">2. คำนวณผลคูณของตัวเลข</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-blue-100 cursor-pointer">
                            <a href="w09.php" class="text-gray-500 group-hover:text-blue-500 transition-all duration-300 group-hover:translate-x-2 flex-1">3. สูตรคูณ</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-blue-100 cursor-pointer">
                            <a href="w10.php" class="text-gray-500 group-hover:text-blue-500 transition-all duration-300 group-hover:translate-x-2 flex-1">4. สร้างรูปแบบตัวเลขสามเหลี่ยม</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-blue-100 cursor-pointer">
                            <a href="w11.php" class="text-gray-500 group-hover:text-blue-500 transition-all duration-300 group-hover:translate-x-2 flex-1">5. สร้างรูปดาวแบบพีระมิด</a>
                            <span class="text-xs bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full border border-orange-100">10 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-pink-100 cursor-pointer">
                            <a href="w12.php" class="text-gray-600 group-hover:text-pink-600 font-medium group-hover:translate-x-2 transition-all duration-300 flex-1">6. คำนวณเลขยกกำลัง</a>
                            <span class="text-xs bg-pink-100 text-pink-600 px-3 py-1.5 rounded-full font-bold shadow-sm">20 คะแนน</span>
                        </li>
                        <li class="flex justify-between items-center group p-3 rounded-xl hover:bg-white hover:shadow-md transition-all duration-300 border border-transparent hover:border-blue-300 cursor-pointer bg-blue-50/50">
                            <a href="w13.php" class="text-blue-700 group-hover:text-blue-600 font-bold group-hover:translate-x-2 transition-all duration-300 flex-1">7. ค้นหาจำนวนเฉพาะ</a>
                            <span class="text-xs bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1.5 rounded-full font-bold shadow-md">30 คะแนน</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <footer class="mt-10 text-center text-white/60 text-sm font-light tracking-wide">
            © 2024 ข้อสอบกลางภาค สงวนลิขสิทธิ์ เบญญาพร ศรีทา
        </footer>
    </div>

</body>
</html>