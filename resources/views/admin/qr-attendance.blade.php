<!-- filepath: c:\laragon\www\gymyankarta\resources\views\admin\qr-attendance.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Absensi - GYMYANKARTA</title>
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
</head>
<body class="font-poppins bg-gray-100 min-h-screen overflow-hidden">
    <div 
    x-data="{
        currentTime: '',
        showInstructions: false,
        progress: 0,
        
        init() {
            this.updateTime();
            setInterval(() => this.updateTime(), 1000);
            this.startProgress();
        },
        
        updateTime() {
            this.currentTime = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        },

        startProgress() {
            setInterval(() => {
                if(this.progress >= 100) {
                    this.progress = 0;
                    refreshQrCode();
                } else {
                    this.progress += (100/30);
                }
            }, 1000);
        }
    }"
    x-init="init()"
    class="min-h-screen flex items-center justify-center bg-[#F8FAFC] font-sans p-4"
>
    <div class="hidden md:flex w-full max-w-6xl h-[700px] bg-white rounded-[3rem] shadow-[0_40px_100px_-20px_rgba(15,23,42,0.15)] overflow-hidden border border-slate-100">
        
        <div class="w-[35%] bg-[#0F172A] p-12 flex flex-col relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-warna-500/10 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-16 h-16 bg-warna-500 rounded-2xl flex items-center justify-center rotate-3 shadow-lg shadow-warna-500/20">
                        <i class="fas fa-dumbbell text-[#0F172A] text-3xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-white italic tracking-tighter leading-none uppercase">Arena</h1>
                        <h2 class="text-warna-500 text-sm font-black italic tracking-[0.3em] uppercase">Fitness</h2>
                    </div>
                </div>

                <div class="h-[2px] w-12 bg-warna-500 mb-10"></div>

                <h3 class="text-white text-xl font-black italic uppercase tracking-tight mb-8">
                    Self <span class="text-warna-500">Check-in</span> Guide
                </h3>

                <div class="space-y-8">
                    @foreach([
                        ['1', 'Open Member App', 'Buka aplikasi member di smartphone Anda'],
                        ['2', 'Tap Scan QR', 'Tekan tombol Scan QR pada dashboard'],
                        ['3', 'Align Camera', 'Arahkan kamera ke kode QR di layar ini'],
                        ['4', 'Success!', 'Tunggu hingga konfirmasi berhasil muncul']
                    ] as $step)
                    <div class="flex items-start gap-5 group">
                        <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-warna-500 text-xs font-black italic border border-slate-700 group-hover:bg-warna-500 group-hover:text-[#0F172A] transition-all duration-300">
                            {{ $step[0] }}
                        </div>
                        <div>
                            <p class="text-white text-[11px] font-black uppercase tracking-widest mb-1 italic">{{ $step[1] }}</p>
                            <p class="text-slate-400 text-xs font-medium leading-relaxed">{{ $step[2] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-auto relative z-10">
                <div class="p-4 bg-slate-900/50 rounded-2xl border border-slate-800">
                    <p class="text-slate-500 text-[9px] font-black uppercase tracking-[0.2em] mb-1 italic text-center">Current Terminal Time</p>
                    <p class="text-white text-2xl font-black italic text-center tracking-widest" x-text="currentTime"></p>
                </div>
            </div>
        </div>
        
        <div class="flex-1 bg-white p-12 flex flex-col items-center justify-center relative">
            <div class="text-center mb-10">
                <div class="inline-block px-4 py-1.5 bg-warna-500/10 rounded-full mb-4 border border-warna-500/20">
                    <span class="text-[10px] font-black text-warna-600 uppercase tracking-[0.2em] italic">Secure Access Control</span>
                </div>
                <h2 class="text-4xl font-black text-[#0F172A] uppercase italic tracking-tighter mb-2">Scan <span class="text-warna-500">QR Code</span></h2>
                <p class="text-slate-400 text-sm font-medium">Arahkan smartphone Anda untuk melakukan absensi otomatis</p>
            </div>
            
            <div class="relative group">
                <div class="absolute -top-4 -left-4 w-12 h-12 border-t-4 border-l-4 border-warna-500 rounded-tl-2xl"></div>
                <div class="absolute -top-4 -right-4 w-12 h-12 border-t-4 border-r-4 border-warna-500 rounded-tr-2xl"></div>
                <div class="absolute -bottom-4 -left-4 w-12 h-12 border-b-4 border-l-4 border-warna-500 rounded-bl-2xl"></div>
                <div class="absolute -bottom-4 -right-4 w-12 h-12 border-b-4 border-r-4 border-warna-500 rounded-br-2xl"></div>

                <div class="size-64 lg:size-80 bg-white rounded-3xl shadow-[0_25px_60px_-15px_rgba(0,0,0,0.1)] flex items-center justify-center relative overflow-hidden p-6 border border-slate-50 transition-transform duration-500 group-hover:scale-[1.02]">
                    <div id="qr-loading" class="absolute inset-0 flex flex-col items-center justify-center bg-white z-20">
                        <div class="w-12 h-12 border-[6px] border-slate-100 border-t-warna-500 rounded-full animate-spin mb-4"></div>
                        <p class="text-[10px] font-black text-slate-400 uppercase italic">Generating Secure Key...</p>
                    </div>
                    
                    <div id="qr-display" class="absolute inset-0 flex items-center justify-center p-8 opacity-0 z-10">
                        <object id="qr-object" data="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full">
                            <embed src="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full" />
                        </object>
                    </div>

                    <div id="qr-error" class="absolute inset-0 flex flex-col items-center justify-center bg-white opacity-0 z-10 p-8 text-center">
                        <i class="fas fa-exclamation-triangle text-rose-500 text-4xl mb-4"></i>
                        <p class="text-xs font-black text-slate-800 uppercase italic">Sync Failed</p>
                        <button onclick="refreshQrCode()" class="mt-4 text-[10px] font-black text-warna-500 underline uppercase italic">Try Re-Sync</button>
                    </div>
                </div>
            </div>

            <div class="mt-16 w-full max-w-sm">
                <div class="flex justify-between items-center mb-3 px-2">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Security Refresh</span>
                    <span class="text-[10px] font-black text-[#0F172A] italic uppercase" x-text="'30 SEC INTERVAL'"></span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden border border-slate-200/50">
                    <div class="bg-warna-500 h-full transition-all duration-1000 ease-linear shadow-[0_0_15px_rgba(163,230,53,0.5)]" :style="`width: ${progress}%` text-warna-500"></div>
                </div>
            </div>

            <button onclick="refreshQrCode()" class="mt-8 flex items-center gap-3 px-8 py-3 bg-[#0F172A] text-warna-500 rounded-2xl font-black text-[10px] uppercase italic tracking-[0.2em] hover:bg-[#1e293b] transition-all active:scale-95 shadow-xl shadow-slate-200">
                <i class="fas fa-sync-alt animate-spin-slow"></i>
                Manual Refresh Key
            </button>
        </div>
    </div>

    <div class="md:hidden flex flex-col w-full h-screen bg-white">
        <div class="bg-[#0F172A] px-8 py-6 flex items-center justify-between rounded-b-[2rem] shadow-xl">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-warna-500 rounded-xl flex items-center justify-center rotate-3">
                    <i class="fas fa-dumbbell text-[#0F172A] text-xl"></i>
                </div>
                <h1 class="text-white text-lg font-black italic uppercase tracking-tighter">Arena <span class="text-warna-500">Scan</span></h1>
            </div>
            <a href="{{ route('dashboard') }}" class="text-slate-400 hover:text-white"><i class="fas fa-times text-xl"></i></a>
        </div>
        
        <div class="flex-1 flex flex-col items-center justify-center px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-[#0F172A] uppercase italic tracking-tighter">Check-In</h2>
                <p class="text-slate-400 text-xs font-medium mt-2">Pindai kode untuk masuk area gym</p>
            </div>

            <div class="relative mb-10">
                <div class="absolute -top-3 -left-3 w-8 h-8 border-t-4 border-l-4 border-warna-500"></div>
                <div class="absolute -bottom-3 -right-3 w-8 h-8 border-b-4 border-r-4 border-warna-500"></div>
                
                <div class="size-64 bg-white rounded-3xl shadow-2xl flex items-center justify-center relative overflow-hidden border border-slate-100 p-4">
                     <div id="qr-loading-mobile" class="absolute inset-0 flex flex-col items-center justify-center bg-white z-20">
                        <div class="w-8 h-8 border-4 border-slate-100 border-t-warna-500 rounded-full animate-spin mb-2"></div>
                    </div>
                    <div id="qr-display-mobile" class="absolute inset-0 flex items-center justify-center p-6 opacity-0 z-10">
                         <object id="qr-object-mobile" data="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full">
                            <embed src="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full" />
                        </object>
                    </div>
                </div>
            </div>

            <div class="w-64 mb-10">
                <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                    <div class="bg-warna-500 h-full transition-all duration-1000 ease-linear" :style="`width: ${progress}%` text-warna-500"></div>
                </div>
            </div>

            <button onclick="refreshQrCode()" class="w-full py-4 bg-[#0F172A] text-warna-500 rounded-2xl font-black text-xs uppercase italic tracking-widest shadow-lg">
                <i class="fas fa-sync-alt mr-2"></i> Refresh Key
            </button>
        </div>

        <div class="p-6 bg-slate-50 border-t border-slate-100">
             <button @click="showInstructions = !showInstructions" class="w-full flex justify-between items-center text-[10px] font-black text-[#0F172A] uppercase tracking-widest italic">
                <span>Panduan Absensi</span>
                <i class="fas" :class="showInstructions ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
             </button>
             <div x-show="showInstructions" x-collapse class="mt-4 space-y-3">
                <p class="text-[11px] text-slate-500 font-medium">1. Buka aplikasi di HP</p>
                <p class="text-[11px] text-slate-500 font-medium">2. Tekan Scan QR di Dashboard</p>
                <p class="text-[11px] text-slate-500 font-medium">3. Scan kode di atas</p>
             </div>
        </div>
    </div>
</div>

<style>
    .animate-spin-slow { animation: spin 3s linear infinite; }
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>

    <script>
        // QR State Management (menggunakan script native yang sudah ada)
        let refreshInterval;
        let progressInterval;
        let refreshProgress = 0;
        
        let qrStates = {
            loading: document.getElementById('qr-loading'),
            display: document.getElementById('qr-display'),
            error: document.getElementById('qr-error')
        };
        
        let qrStatesMobile = {
            loading: document.getElementById('qr-loading-mobile'),
            display: document.getElementById('qr-display-mobile'),
            error: document.getElementById('qr-error-mobile')
        };
        
        function showQrState(state) {
            // Desktop states
            Object.values(qrStates).forEach(el => {
                if (el) {
                    el.style.opacity = '0';
                    el.style.zIndex = '10';
                }
            });
            
            // Mobile states
            Object.values(qrStatesMobile).forEach(el => {
                if (el) {
                    el.style.opacity = '0';
                    el.style.zIndex = '10';
                }
            });
            
            // Show selected state for both desktop and mobile
            if (qrStates[state]) {
                qrStates[state].style.opacity = '1';
                qrStates[state].style.zIndex = '20';
            }
            if (qrStatesMobile[state]) {
                qrStatesMobile[state].style.opacity = '1';
                qrStatesMobile[state].style.zIndex = '20';
            }
        }
        
        function showQrCode() {
            showQrState('display');
        }
        
        function showQrError() {
            showQrState('error');
        }
        
        function showLoading() {
            showQrState('loading');
        }
        
        function refreshQrCode() {
            const timestamp = new Date().getTime();
            
            // Show loading
            showLoading();
            
            // Update QR source for both desktop and mobile
            const qrObject = document.getElementById('qr-object');
            const qrObjectMobile = document.getElementById('qr-object-mobile');
            
            if (qrObject) {
                qrObject.data = "{{ route('qr.generate') }}?t=" + timestamp;
            }
            if (qrObjectMobile) {
                qrObjectMobile.data = "{{ route('qr.generate') }}?t=" + timestamp;
            }
            
            // Update timestamp
            const lastUpdated = document.getElementById('last-updated');
            if (lastUpdated) {
                lastUpdated.textContent = new Date().toLocaleTimeString('id-ID');
            }
            
            // Reset progress
            refreshProgress = 0;
            updateProgressBar();
            
            // Show QR after delay
            setTimeout(() => {
                showQrCode();
            }, 1500);
        }
        
        function updateProgressBar() {
            const progressBar = document.getElementById('refresh-progress');
            const progressBarMobile = document.getElementById('refresh-progress-mobile');
            
            if (progressBar) {
                progressBar.style.width = refreshProgress + '%';
            }
            if (progressBarMobile) {
                progressBarMobile.style.width = refreshProgress + '%';
            }
        }
        
        function startProgressBar() {
            refreshProgress = 0;
            
            if (progressInterval) {
                clearInterval(progressInterval);
            }
            
            progressInterval = setInterval(() => {
                refreshProgress += (100 / 30); // 30 seconds
                if (refreshProgress >= 100) {
                    refreshProgress = 0;
                }
                updateProgressBar();
            }, 1000);
        }
        
        function startAutoRefresh() {
            if (refreshInterval) clearInterval(refreshInterval);
            if (progressInterval) clearInterval(progressInterval);
            
            refreshInterval = setInterval(refreshQrCode, 30000); // 30 seconds
            startProgressBar();
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            showLoading();
            
            // Show QR after loading simulation
            setTimeout(() => {
                showQrCode();
                startAutoRefresh();
            }, 2000);
            
            // Handle QR object events
            const qrObjects = [
                document.getElementById('qr-object'),
                document.getElementById('qr-object-mobile')
            ];
            
            qrObjects.forEach(qrObject => {
                if (qrObject) {
                    qrObject.addEventListener('load', () => showQrCode());
                    qrObject.addEventListener('error', () => showQrError());
                }
            });
        });
        
        // Handle page visibility
        document.addEventListener('visibilitychange', function() {
            if (document.visibilityState === 'visible') {
                refreshQrCode();
                startAutoRefresh();
            } else {
                if (refreshInterval) clearInterval(refreshInterval);
                if (progressInterval) clearInterval(progressInterval);
            }
        });
        
        // Cleanup
        window.addEventListener('beforeunload', function() {
            if (refreshInterval) clearInterval(refreshInterval);
            if (progressInterval) clearInterval(progressInterval);
        });
    </script>
</body>
</html>