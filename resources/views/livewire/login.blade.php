<div class="flex items-center justify-center min-h-screen bg-[#0a0a0a] py-12 px-4 relative overflow-hidden font-sans">
    
    <div class="absolute top-0 left-0 w-full h-full opacity-20 pointer-events-none">
        <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-warna-500/40 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-warna-500/30 rounded-full blur-[120px]"></div>
    </div>

    <div class="w-full max-w-[480px] z-10">
        <div class="bg-zinc-900/80 backdrop-blur-xl border border-white/5 p-8 md:p-12 shadow-2xl rounded-3xl">
            <div class="mb-10">
    <div class="flex flex-col items-center justify-center space-y-4">
        
        <div class="group cursor-pointer">
            <div class="w-12 h-12 bg-[#D9FF00] flex items-center justify-center rounded-sm rotate-3 group-hover:rotate-0 transition-all duration-300 shadow-[0_0_20px_rgba(217,255,0,0.3)]">
                <span class="text-black font-black text-2xl italic select-none">A</span>
            </div>
        </div>
        
        <div class="text-center">
            <h2 class="text-3xl md:text-4xl font-black text-white uppercase italic tracking-tighter leading-none">
                ARENA <span class="text-[#D9FF00]">FITNES</span>
            </h2>
            <div class="flex items-center justify-center gap-3 mt-3">
                <span class="h-[1px] w-8 bg-zinc-800"></span>
                <p class="text-zinc-500 text-[10px] font-bold uppercase tracking-[0.3em] whitespace-nowrap">
                    Arena Fitness Center
                </p>
                <span class="h-[1px] w-8 bg-zinc-800"></span>
            </div>
        </div>
        
    </div>
</div>

            @if (session()->has('success') || session()->has('error'))
                <div class="mb-6 space-y-2">
                    @if (session()->has('success'))
                        <div class="px-4 py-3 bg-green-500/10 border-l-4 border-green-500 text-green-500 text-xs font-bold uppercase tracking-wider">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="px-4 py-3 bg-red-500/10 border-l-4 border-red-500 text-red-500 text-xs font-bold uppercase tracking-wider">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            @endif

            <form wire:submit.prevent="login" class="space-y-6">          
                
                <div class="relative group">
                    <input type="text" id="username" wire:model="username" 
                        class="block w-full px-4 py-4 bg-zinc-800/50 border border-zinc-700 text-white focus:outline-none focus:border-warna-500 transition-all peer rounded-xl placeholder-transparent" 
                        placeholder="Username" required/>
                    <label for="username" 
                        class="absolute text-xs font-bold text-zinc-500 uppercase tracking-widest duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-zinc-900 px-2 peer-focus:px-2 peer-focus:text-warna-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-3 pointer-events-none">
                        Warrior ID
                    </label>
                </div>

                <div class="relative group">
                    <input type="password" id="password" wire:model="password" 
                        class="block w-full px-4 py-4 bg-zinc-800/50 border border-zinc-700 text-white focus:outline-none focus:border-warna-500 transition-all peer rounded-xl placeholder-transparent" 
                        placeholder="Password" required/>
                    <label for="password" 
                        class="absolute text-xs font-bold text-zinc-500 uppercase tracking-widest duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-zinc-900 px-2 peer-focus:px-2 peer-focus:text-warna-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-3 pointer-events-none">
                        Secret Access
                    </label>
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 px-4 flex items-center text-zinc-500 hover:text-warna-500 transition-colors">
                        <span id="eyeIcon"><i class="fa-solid fa-eye text-sm"></i></span>
                    </button>
                </div>

                <div class="pt-4">
                    <button type="submit" wire:loading.attr="disabled"
                            class="w-full py-4 bg-warna-500 text-black font-black uppercase tracking-widest text-sm rounded-xl hover:bg-white hover:shadow-[0_0_20px_rgba(250,204,21,0.4)] transition-all duration-300 active:scale-[0.98]">
                        <span wire:loading.remove>Enter the Arena</span>
                        <span wire:loading class="flex items-center justify-center">
                            <i class="fas fa-spinner fa-spin mr-2"></i> Verifying...
                        </span>
                    </button>
                </div>

                <div class="text-center pt-2">
                    <p class="text-zinc-500 text-[11px] font-bold uppercase tracking-widest">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-warna-500 hover:text-white transition-colors border-b border-warna-500/30 hover:border-white">Daftar Sekarang</a>
                    </p>
                </div>
            </form>
        </div>

       
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<i class="fa-solid fa-eye-slash text-sm"></i>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<i class="fa-solid fa-eye text-sm"></i>';
            }
        }
    </script>
</div>