<div class="flex items-center justify-center min-h-screen py-12 px-4 relative overflow-hidden font-sans">

    <div class="w-full max-w-[480px] z-10">
        <div class="bg-white p-10 md:p-14 rounded-[3rem] shadow-xl relative overflow-hidden">
            
            <div class="absolute top-0 right-0 w-24 h-24 bg-warna-500/5 rounded-bl-full"></div>

            <div class="mb-12 text-center">
                <div class="inline-flex flex-col items-center group mb-6">
                    <div class="w-20 h-20 bg-[#0F172A] rounded-2xl flex items-center justify-center rotate-3 group-hover:rotate-0 transition-transform duration-500 shadow-xl shadow-warna-500/20">
                        <i class="fas fa-dumbbell text-warna-500 text-3xl"></i>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter leading-none">
                            Arena <span class="text-warna-500">Fitness</span>
                        </h1>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1 italic">Authorized Access Only</p>
                    </div>
                </div>
               
                <p class="text-slate-400 text-sm font-medium italic">Silahkan masuk ke terminal akun Anda.</p>
            </div>

            @if (session()->has('success') || session()->has('error'))
                <div class="mb-8 animate-in fade-in slide-in-from-top-4 duration-300">
                    @if (session()->has('success'))
                        <div class="px-4 py-3 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 text-[10px] font-black uppercase italic tracking-widest">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="px-4 py-3 bg-rose-50 border-l-4 border-rose-500 text-rose-700 text-[10px] font-black uppercase italic tracking-widest">
                            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                        </div>
                    @endif
                </div>
            @endif

            <form wire:submit.prevent="login" class="space-y-6">          
                
                <div class="relative group">
                    <input type="text" id="username" wire:model="username" 
                        class="block w-full px-5 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-[#0F172A] font-bold italic focus:outline-none focus:border-warna-500 focus:bg-white transition-all peer placeholder-transparent" 
                        placeholder="Warrior ID" required/>
                    <label for="username" 
                        class="absolute text-[10px] font-black text-slate-400 uppercase tracking-widest italic duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-transparent px-2 peer-focus:text-warna-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-placeholder-shown:text-sm peer-focus:scale-75 peer-focus:-translate-y-4 left-4 pointer-events-none transition-all">
                        Warrior ID / Username
                    </label>
                </div>

                <div class="relative group">
                    <input type="password" id="password" wire:model="password" 
                        class="block w-full px-5 py-4 bg-slate-50 border-2 border-transparent rounded-2xl text-[#0F172A] font-bold italic focus:outline-none focus:border-warna-500 focus:bg-white transition-all peer placeholder-transparent" 
                        placeholder="Secret Access" required/>
                    <label for="password" 
                        class="absolute text-[10px] font-black text-slate-400 uppercase tracking-widest italic duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-transparent px-2 peer-focus:text-warna-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-placeholder-shown:text-sm peer-focus:scale-75 peer-focus:-translate-y-4 left-4 pointer-events-none transition-all">
                        Secret Access Key
                    </label>
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-4 flex items-center text-slate-300 hover:text-warna-600 transition-colors">
                        <span id="eyeIcon"><i class="fa-solid fa-eye text-xs"></i></span>
                    </button>
                </div>

                <div class="pt-4">
                    <button type="submit" wire:loading.attr="disabled"
                            class="w-full py-5 bg-[#0F172A] text-warna-500 font-black uppercase tracking-[0.3em] text-xs italic rounded-2xl hover:bg-slate-800 shadow-2xl shadow-slate-200 transition-all duration-300 active:scale-[0.98] flex items-center justify-center gap-3">
                        <span wire:loading.remove class="flex items-center gap-2">
                            <i class="fas fa-sign-in-alt text-[10px]"></i> Enter the Arena
                        </span>
                        <span wire:loading class="flex items-center justify-center">
                            <i class="fas fa-circle-notch fa-spin mr-2"></i> Verifying...
                        </span>
                    </button>
                </div>

                <div class="text-center pt-4">
                    <p class="text-slate-400 text-[11px] font-bold uppercase italic tracking-widest">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-warna-600 hover:text-[#0F172A] transition-colors border-b border-warna-500/30 hover:border-[#0F172A] ml-1">Daftar Sekarang</a>
                    </p>
                </div>
            </form>
        </div>

        <p class="text-center mt-10 text-[9px] font-black text-slate-500 uppercase tracking-[0.4em] italic opacity-50">
            Arena Management System v2.0
        </p>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<i class="fa-solid fa-eye-slash text-xs"></i>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<i class="fa-solid fa-eye text-xs"></i>';
            }
        }
    </script>
</div>