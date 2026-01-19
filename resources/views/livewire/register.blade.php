<div class="min-h-screen flex items-center justify-center bg-[#F8FAFC] p-4 font-sans">
    <div
        class="w-full max-w-xl bg-white p-10 md:p-14 rounded-[3rem] shadow-[0_40px_100px_-20px_rgba(15,23,42,0.1)] border border-slate-50 relative overflow-hidden">

        <div class="absolute top-0 right-0 w-32 h-32 bg-warna-500/5 rounded-bl-full"></div>

        <div class="mb-12 text-center">
            <a href="{{ route('home') }}" class="inline-flex flex-col items-center group mb-6">
                <div
                    class="w-20 h-20 bg-[#0F172A] rounded-2xl flex items-center justify-center rotate-3 group-hover:rotate-0 transition-transform duration-500 shadow-xl shadow-warna-500/20">
                    <i class="fas fa-dumbbell text-warna-500 text-3xl"></i>
                </div>
                <div class="mt-4">
                    <h1 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter leading-none">Arena
                        <span class="text-warna-500">Fitness</span></h1>
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1">Join The Elite Tribe
                    </p>
                </div>
            </a>

            <p class="text-slate-400 text-sm font-medium italic">Daftar sekarang untuk akses eksklusif fasilitas kami.
            </p>
        </div>

        @if (session()->has('success'))
            <div
                class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-xl text-xs font-bold animate-in fade-in slide-in-from-top-4">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div
                class="mb-8 p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-700 rounded-xl text-xs font-bold animate-in fade-in slide-in-from-top-4">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            </div>
        @endif

       <form wire:submit.prevent="register" class="space-y-5">
    
    <div class="relative group mt-4">
        <input type="text" id="name" wire:model="name" autocomplete="off"
            class="block w-full pl-12 pr-5 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="Nama Lengkap" required/>
        
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
            <i class="fa-solid fa-address-card text-sm"></i>
        </div>

        <label for="name" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            Nama Lengkap
        </label>
        @error('name')
            <span class="text-rose-600 text-[9px] font-black uppercase italic mt-1 ml-4 tracking-widest block">{{ $message }}</span>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="relative group mt-2">
            <input type="number" id="nomor_telepon" wire:model="nomor_telepon"
                class="block w-full pl-12 pr-5 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
                placeholder="Nomor Telepon" required/>
            
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
                <i class="fa-solid fa-phone-flip text-sm"></i>
            </div>

            <label for="nomor_telepon" 
                class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
                peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
                peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
                pointer-events-none">
                Nomor Telepon
            </label>
            @error('nomor_telepon')
                <span class="text-rose-600 text-[9px] font-black uppercase italic mt-1 ml-4 tracking-widest block">{{ $message }}</span>
            @enderror
        </div>

        <div class="relative group mt-2">
            <input type="text" id="username" wire:model="username"
                class="block w-full pl-12 pr-5 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
                placeholder="Username" required/>
            
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
            @error('username')
                <span class="text-rose-600 text-[9px] font-black uppercase italic mt-1 ml-4 tracking-widest block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="relative group mt-2">
        <input type="email" id="email" wire:model="email"
            class="block w-full pl-12 pr-5 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="Email Address" required/>
        
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
            <i class="fa-solid fa-envelope text-sm"></i>
        </div>

        <label for="email" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            Email 
        </label>
        @error('email')
            <span class="text-rose-600 text-[9px] font-black uppercase italic mt-1 ml-4 tracking-widest block">{{ $message }}</span>
        @enderror
    </div>

    <div class="relative group mt-2">
        <input type="password" id="password" wire:model="password"
            class="block w-full pl-12 pr-14 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="Password" required/>
        
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
            <i class="fa-solid fa-shield-halved text-sm"></i>
        </div>

        <label for="password" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            password
        </label>
        
        <button type="button" onclick="togglePassword()" 
            class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-300 hover:text-warna-500 transition-colors">
            <span id="eyeIcon"><i class="fa-solid fa-eye text-sm"></i></span>
        </button>
        @error('password')
            <span class="text-rose-600 text-[9px] font-black uppercase italic mt-1 ml-4 tracking-widest block">{{ $message }}</span>
        @enderror
    </div>

    <div class="pt-4">
        <button type="submit" wire:loading.attr="disabled" wire:target="register"
             class="group relative w-full py-5 bg-[#0F172A] text-warna-500 font-black uppercase tracking-[0.3em] text-[10px] italic rounded-2xl overflow-hidden transition-all duration-300 hover:bg-slate-800 shadow-[0_10px_30px_rgba(15,23,42,0.3)] active:scale-[0.97] flex items-center justify-center gap-3">
            
            <i wire:loading wire:target="register" class="fas fa-spinner fa-spin text-warna-500"></i>

            <span wire:loading.remove wire:target="register" class="flex items-center gap-2">
                JOIN THE ARENA <i class="fas fa-user-plus text-[10px]"></i>
            </span>
            <span wire:loading wire:target="register" class="text-warna-500">PROCESSING...</span>
        </button>
    </div>

    <div class="text-center pt-4">
        <p class="text-slate-400 text-[10px] font-black uppercase italic tracking-widest">
            Sudah terdaftar sebelumnya? 
            <a href="{{ route('login') }}" class="text-[#0F172A] hover:text-warna-500 transition-all font-black border-b-2 border-warna-500/20 hover:border-warna-500 pb-0.5 ml-1">
                MASUK SEKARANG
            </a>
        </p>
    </div>
</form>
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
