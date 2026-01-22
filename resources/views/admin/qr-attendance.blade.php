<!-- filepath: c:\laragon\www\gymyankarta\resources\views\admin\qr-attendance.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Absensi - ARENA FITNES CENTER</title>
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
    <div class="hidden md:flex w-full max-w-[1400px] h-[85vh] bg-white rounded-[3.5rem] shadow-[0_40px_100px_-20px_rgba(15,23,42,0.15)] overflow-hidden border border-slate-100">
        
        <div class="w-[28%] bg-[#0F172A] p-12 flex flex-col relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-80 h-80 bg-warna-500/10 rounded-full blur-[100px]"></div>
            
            <div class="relative z-10 flex flex-col h-full">
                <div class="flex items-center gap-4 mb-12">
                    <div class="w-16 h-16 bg-warna-500 rounded-2xl flex items-center justify-center rotate-3 shadow-lg shadow-warna-500/20">
                        <i class="fas fa-dumbbell text-[#0F172A] text-3xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-white italic tracking-tighter leading-none uppercase">Sport</h1>
                        <h2 class="text-warna-500 text-sm font-black italic tracking-[0.3em] uppercase">Center</h2>
                    </div>
                </div>

                <div class="space-y-10">
                    <div>
                        <h3 class="text-white text-xl font-black italic uppercase tracking-tight mb-6">
                            Self <span class="text-warna-500">Check-in</span>
                        </h3>
                        <div class="space-y-8">
                            @foreach([
                                ['1', 'Buka Aplikasi', 'Gunakan menu Scan QR di HP'],
                                ['2', 'Pindai Kode', 'Arahkan kamera ke QR di samping'],
                                ['3', 'Berhasil', 'Masuk area gym dengan nyaman']
                            ] as $step)
                            <div class="flex items-start gap-5">
                                <div class="w-8 h-8 shrink-0 rounded-lg bg-slate-800 flex items-center justify-center text-warna-500 text-xs font-black italic border border-slate-700">
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
                </div>

                <div class="mt-auto">
                    <div class="p-6 bg-slate-900/50 rounded-[2rem] border border-slate-800 backdrop-blur-sm">
                        <p class="text-slate-500 text-[9px] font-black uppercase tracking-[0.2em] mb-2 italic text-center">Terminal Local Time</p>
                        <p class="text-white text-3xl font-black italic text-center tracking-widest" x-text="currentTime"></p>
                    </div>
                </div>
            </div>
        </div>
        
       <div class="flex-1 bg-white p-8 lg:p-12 flex flex-col items-center justify-between min-h-0 relative">
    
    <div class="text-center shrink-0">
        <div class="inline-block px-5 py-2 bg-warna-500/10 rounded-full mb-3 border border-warna-500/20">
            <span class="text-[10px] font-black text-warna-600 uppercase tracking-[0.2em] italic">High Definition Secure Access Control</span>
        </div>
        <h2 class="text-4xl lg:text-5xl font-black text-[#0F172A] uppercase italic tracking-tighter leading-tight">
            SCAN <span class="text-warna-500">SEKARANG</span>
        </h2>
    </div>
    
    <div class="relative flex-1 w-full flex items-center justify-center min-h-0 my-2">
        
        <div class="absolute aspect-square h-full max-h-[60vh] pointer-events-none z-20">
            <div class="absolute -top-2 -left-2 w-20 h-20 border-t-[10px] border-l-[10px] border-warna-500 rounded-tl-[2rem]"></div>
            <div class="absolute -top-2 -right-2 w-20 h-20 border-t-[10px] border-r-[10px] border-warna-500 rounded-tr-[2rem]"></div>
            <div class="absolute -bottom-2 -left-2 w-20 h-20 border-b-[10px] border-l-[10px] border-warna-500 rounded-bl-[2rem]"></div>
            <div class="absolute -bottom-2 -right-2 w-20 h-20 border-b-[10px] border-r-[10px] border-warna-500 rounded-br-[2rem]"></div>
        </div>

        <div class="aspect-square h-full max-h-[60vh] bg-white rounded-[2.5rem] shadow-[0_30px_80px_-15px_rgba(0,0,0,0.1)] flex items-center justify-center relative overflow-hidden p-6 border border-slate-50">
            
            <div id="qr-loading" class="absolute inset-0 flex flex-col items-center justify-center bg-white z-20">
                <div class="w-12 h-12 border-[6px] border-slate-100 border-t-warna-500 rounded-full animate-spin"></div>
            </div>
            
            <div id="qr-display" class="w-full h-full flex items-center justify-center opacity-0 z-10 transition-opacity duration-500">
                <object id="qr-object" data="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full scale-[1.05]">
                    <embed src="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full" />
                </object>
            </div>
        </div>
    </div>

    <div class="w-full max-w-xl shrink-0 mt-4">
        <div class="flex justify-between items-center mb-2 px-2">
            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Dynamic Key Refresh</span>
            <span class="text-[10px] font-black text-[#0F172A] italic uppercase bg-warna-500 px-4 py-1 rounded-lg" x-text="'30s Auto Refresh'"></span>
        </div>
        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden border border-slate-200/50">
            <div class="bg-warna-500 h-full transition-all duration-1000 ease-linear shadow-[0_0_20px_rgba(163,230,53,0.6)]" :style="`width: ${progress}%` text-warna-500"></div>
        </div>
    </div>
</div>
    </div>

    <div class="md:hidden flex flex-col w-full h-screen bg-white">
        <div class="bg-[#0F172A] px-8 py-10 flex items-center justify-between rounded-b-[3.5rem] shadow-xl">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-warna-500 rounded-2xl flex items-center justify-center rotate-3">
                    <i class="fas fa-dumbbell text-[#0F172A] text-2xl"></i>
                </div>
                <h1 class="text-white text-xl font-black italic uppercase tracking-tighter">Arena <span class="text-warna-500">Scan</span></h1>
            </div>
            <a href="{{ route('dashboard') }}" class="text-slate-400 text-2xl"><i class="fas fa-times"></i></a>
        </div>
        
        <div class="flex-1 flex flex-col items-center justify-center px-6">
            <div class="relative mb-12">
                <div class="absolute -top-4 -left-4 w-12 h-12 border-t-8 border-l-8 border-warna-500 rounded-tl-2xl"></div>
                <div class="absolute -bottom-4 -right-4 w-12 h-12 border-b-8 border-r-8 border-warna-500 rounded-br-2xl"></div>
                
                <div class="size-80 bg-white rounded-[2.5rem] shadow-2xl flex items-center justify-center relative overflow-hidden border border-slate-100 p-6">
                     <div id="qr-loading-mobile" class="absolute inset-0 flex flex-col items-center justify-center bg-white z-20">
                        <div class="w-10 h-10 border-4 border-slate-100 border-t-warna-500 rounded-full animate-spin"></div>
                    </div>
                    <div id="qr-display-mobile" class="absolute inset-0 flex items-center justify-center p-4 opacity-0 z-10">
                         <object id="qr-object-mobile" data="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full scale-110">
                            <embed src="{{ route('qr.generate') }}?t={{ time() }}" type="image/svg+xml" class="w-full h-full" />
                        </object>
                    </div>
                </div>
            </div>

            <div class="w-72 bg-slate-100 rounded-full h-3 overflow-hidden mb-10 border border-slate-200">
                <div class="bg-warna-500 h-full transition-all duration-1000 ease-linear shadow-[0_0_15px_rgba(163,230,53,0.5)]" :style="`width: ${progress}%` text-warna-500"></div>
            </div>

            <button onclick="refreshQrCode()" class="w-full max-w-xs py-5 bg-[#0F172A] text-warna-500 rounded-3xl font-black text-sm uppercase italic tracking-widest shadow-xl active:scale-95 transition-all">
                <i class="fas fa-sync-alt mr-2"></i> Refresh QR Code
            </button>
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