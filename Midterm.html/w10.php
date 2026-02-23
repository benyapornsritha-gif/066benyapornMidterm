<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.4 สร้างรูปแบบตัวเลขสามเหลี่ยม</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; -webkit-font-smoothing: antialiased; }
        @keyframes fadeUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-up { animation: fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .triangle-output { line-height: 1.8; letter-spacing: 0.25em; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-gray-100 min-h-screen flex flex-col">

    <nav class="bg-[#0f172a]/90 backdrop-blur-md text-white py-4 px-6 flex justify-between items-center shadow-md sticky top-0 z-50 border-b border-white/10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3 cursor-pointer hover:opacity-80 transition">
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 p-1.5 rounded-lg shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide">สอบกลางภาค</span>
            </div>
            <div class="hidden md:flex gap-8 text-sm font-medium items-center">
                <a href="#" class="text-gray-300 hover:text-white transition">คำอธิบาย</a>
                <a href="#" class="text-gray-300 hover:text-white transition">การเขียนโปรแกรมแบบมีเงื่อนไข ▾</a>
                <a href="#" class="text-purple-400 font-semibold border-b-2 border-purple-400 pb-1">เขียนโปรแกรมวนซ้ำ ▾</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto flex justify-center items-center py-12 px-4 relative">
        <div class="absolute top-10 right-20 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>
        <div class="absolute bottom-10 left-20 w-72 h-72 bg-fuchsia-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 pointer-events-none hidden md:block"></div>

        <div class="max-w-4xl w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row border border-gray-100 relative z-10 min-h-[420px]">
            
            <div class="flex-1 p-8 md:p-12 relative flex flex-col justify-center">
                <h2 class="text-3xl font-extrabold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-gray-800 to-gray-600 flex items-center gap-3">
                    <span class="bg-gray-100 text-gray-700 w-10 h-10 flex items-center justify-center rounded-xl shadow-sm text-lg">2.4</span>
                    ตัวเลขสามเหลี่ยม
                </h2>
                
                <div class="space-y-6 relative z-10">
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-600 mb-1.5 group-focus-within:text-purple-600 transition-colors">กรอกจำนวนแถว (n)</label>
                        <input type="number" id="rowsInput" placeholder="กรอกค่า n" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-purple-500 transition-all outline-none shadow-sm hover:border-purple-300 text-lg">
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button onclick="generateTriangle()" class="flex-[1.5] bg-gradient-to-r from-[#a55eea] to-[#8854d0] hover:from-[#8854d0] hover:to-[#7343b3] text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-purple-500/30 transform active:scale-95 transition-all duration-200">
                            แสดงรูปแบบ
                        </button>
                        <button onclick="resetForm()" class="flex-1 bg-white border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 text-gray-600 font-bold py-3.5 px-6 rounded-xl transform active:scale-95 transition-all duration-200">
                            ล้างข้อมูล
                        </button>
                    </div>

                    <div id="resultArea" class="mt-8 p-6 bg-gradient-to-b from-purple-50 to-white rounded-2xl border border-purple-100 shadow-inner hidden animate-fade-up overflow-x-auto">
                        <pre id="triangleOutput" class="triangle-output text-center font-mono text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-700 to-indigo-600"></pre>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-gradient-to-br from-[#ff7675] to-[#fab1a0] p-8 md:p-12 text-white flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full blur-2xl -ml-10 -mb-10 pointer-events-none"></div>

                <div class="relative z-10 text-center md:text-left">
                    <div class="inline-block bg-white/20 text-white font-semibold px-4 py-1.5 rounded-full text-sm mb-6 backdrop-blur-sm border border-white/30 shadow-sm">
                        Nested Loops
                    </div>
                    <h3 class="text-3xl font-extrabold mb-4 drop-shadow-md">รายละเอียดโจทย์</h3>
                    <p class="mb-8 text-white/90 font-light leading-relaxed">
                        กรอกจำนวนแถวที่ต้องการ แล้วโปรแกรมจะแสดงรูปแบบ <strong>ตัวเลขสามเหลี่ยมมุมฉาก</strong>
                    </p>
                    
                    <div class="space-y-4 text-sm opacity-95 text-left">
                        <section class="bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
                            <h4 class="font-bold text-base mb-3 text-red-100">✨ เงื่อนไขการคำนวณ</h4>
                            <ul class="space-y-3 list-none ml-0">
                                <li class="flex gap-2 items-start"><span class="text-lg">🔁</span> ใช้ Loop ซ้อนเพื่อตรวจสอบจำนวนตัวเลขในแต่ละแถว</li>
                                <li class="flex gap-2 items-start"><span class="text-lg">📐</span> แถวที่ 1 มี 1 ตัวเลข, แถวที่ 2 มี 2 ตัวเลข ไปเรื่อยๆ จนถึงแถวที่ n</li>
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
        function generateTriangle() {
            const n = parseInt(document.getElementById('rowsInput').value);
            const resultArea = document.getElementById('resultArea');
            const triangleOutput = document.getElementById('triangleOutput');

            if (isNaN(n) || n < 1) {
                alert("กรุณากรอกจำนวนแถวที่มากกว่า 0 ครับ");
                return;
            }

            let pattern = "";
            for (let i = 1; i <= n; i++) {
                let row = "";
                for (let j = 1; j <= i; j++) {
                    row += j + " ";
                }
                pattern += row.trim() + "\n";
            }

            resultArea.classList.remove('hidden');
            resultArea.classList.add('animate-fade-up');
            triangleOutput.innerText = pattern;
        }

        function resetForm() {
            document.getElementById('rowsInput').value = "";
            const resultArea = document.getElementById('resultArea');
            resultArea.classList.add('hidden');
            resultArea.classList.remove('animate-fade-up');
        }
    </script>
</body>
</html>