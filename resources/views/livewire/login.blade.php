<div class="flex items-center justify-center min-h-screen py-12 px-4 relative overflow-hidden font-sans">

    <div class="w-full max-w-[480px] z-10">
        <div class="bg-white p-10 md:p-14 rounded-[3rem] shadow-xl relative overflow-hidden">
            
            

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

<form wire:submit.prevent="login" class="space-y-5">
    <div class="relative mt-4"> <input type="text" id="username" wire:model="username" autocomplete="off"
            class="block w-full pl-12 pr-5 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="Warrior ID" required/>
        
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
            <i class="fa-solid fa-user-ninja text-sm"></i>
        </div>

        <label for="username" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            Username
        </label>
    </div>

    <div class="relative mt-4">
        <input type="password" id="password" wire:model="password" 
            class="block w-full pl-12 pr-14 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="Secret Access" required/>
        
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
            <i class="fa-solid fa-shield-halved text-sm"></i>
        </div>

        <label for="password" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            Password
        </label>
        
        <button type="button" onclick="togglePassword()" 
            class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-300 hover:text-warna-500 transition-colors">
            <span id="eyeIcon"><i class="fa-solid fa-eye text-sm"></i></span>
        </button>
    </div>

    <div class="pt-6">
        <button type="submit" wire:loading.attr="disabled"
            class="group relative w-full py-5 bg-[#0F172A] text-warna-500 font-black uppercase tracking-[0.3em] text-[10px] italic rounded-2xl overflow-hidden transition-all duration-300 hover:bg-slate-800 shadow-[0_10px_30px_rgba(15,23,42,0.3)] active:scale-[0.97] flex items-center justify-center gap-3">
            
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

            <span wire:loading.remove class="flex items-center gap-3 relative z-10">
                ENTER THE ARENA <i class="fas fa-bolt-lightning animate-pulse"></i>
            </span>
            
            <span wire:loading class="flex items-center justify-center relative z-10">
                <i class="fas fa-circle-notch fa-spin mr-3"></i> VERIFYING...
            </span>
        </button>
    </div>

    <div class="text-center pt-6">
        <p class="text-slate-400 text-[10px] font-black uppercase italic tracking-[0.1em]">
            Belum terdaftar di sistem? 
            <a href="{{ route('register') }}" class="text-[#0F172A] hover:text-warna-500 transition-all font-black border-b-2 border-warna-500/20 hover:border-warna-500 pb-0.5 ml-1">
                DAFTAR  SEKARANG
            </a>
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
                eyeIcon.innerHTML = '<i class="fa-solid fa-eye-slash text-xs"></i>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<i class="fa-solid fa-eye text-xs"></i>';
            }
        }
    </script>
</div>