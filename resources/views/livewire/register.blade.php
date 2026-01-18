<div class="min-h-screen flex items-center justify-center bg-[#F8FAFC] p-4 font-sans">
    <div class="w-full max-w-xl bg-white p-10 md:p-14 rounded-[3rem] shadow-[0_40px_100px_-20px_rgba(15,23,42,0.1)] border border-slate-50 relative overflow-hidden">
        
        <div class="absolute top-0 right-0 w-32 h-32 bg-warna-500/5 rounded-bl-full"></div>
        
        <div class="mb-12 text-center">
            <a href="{{ route('home') }}" class="inline-flex flex-col items-center group mb-6">
                <div class="w-20 h-20 bg-[#0F172A] rounded-2xl flex items-center justify-center rotate-3 group-hover:rotate-0 transition-transform duration-500 shadow-xl shadow-warna-500/20">
                    <i class="fas fa-dumbbell text-warna-500 text-3xl"></i>
                </div>
                <div class="mt-4">
                    <h1 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter leading-none">Arena <span class="text-warna-500">Fitness</span></h1>
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1">Join The Elite Tribe</p>
                </div>
            </a>
           
            <p class="text-slate-400 text-sm font-medium italic">Daftar sekarang untuk akses eksklusif fasilitas kami.</p>
        </div>

        @if (session()->has('success'))
            <div class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-xl text-xs font-bold animate-in fade-in slide-in-from-top-4">
               <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="mb-8 p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-700 rounded-xl text-xs font-bold animate-in fade-in slide-in-from-top-4">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="register" class="space-y-6">
            <div class="group">
                <x-g-input 
                    id="name"
                    label="Nama Lengkap"
                    wireModel="name"
                    type="text"
                    class="bg-slate-50 border-transparent focus:border-warna-500 rounded-2xl font-bold italic"
                />
                @error('name')
                    <span class="text-rose-600 text-[10px] font-black uppercase italic mt-2 ml-2 tracking-widest block">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="group">
                    <x-g-input 
                        id="nomor_telepon"
                        label="Nomor Telepon"
                        wireModel="nomor_telepon"
                        type="number"
                        class="bg-slate-50 border-transparent focus:border-warna-500 rounded-2xl font-bold italic"
                    />
                    @error('nomor_telepon')
                        <span class="text-rose-600 text-[10px] font-black uppercase italic mt-2 ml-2 tracking-widest block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="group">
                    <x-g-input 
                        id="username"
                        label="Username"
                        wireModel="username"
                        class="bg-slate-50 border-transparent focus:border-warna-500 rounded-2xl font-bold italic"
                    />
                    @error('username')
                        <span class="text-rose-600 text-[10px] font-black uppercase italic mt-2 ml-2 tracking-widest block">{{ $message }}</span>            
                    @enderror
                </div>
            </div>

            <div class="group">
                <x-g-input 
                    id="email"
                    label="Email Address"
                    wireModel="email"
                    type="email"
                    class="bg-slate-50 border-transparent focus:border-warna-500 rounded-2xl font-bold italic"
                />
                @error('email')
                    <span class="text-rose-600 text-[10px] font-black uppercase italic mt-2 ml-2 tracking-widest block">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative group">
                <div class="relative">
                    <input type="password" id="password" name="password" wire:model="password" 
                           class="block w-full px-5 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:outline-none focus:border-warna-500 focus:bg-white text-sm font-bold text-[#0F172A] transition-all peer italic" placeholder=" " required/>
                    
                    <label for="password" 
                           class="absolute text-[10px] font-black uppercase tracking-widest text-slate-400 italic duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-transparent px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-placeholder-shown:text-sm peer-focus:text-warna-600 peer-focus:scale-75 peer-focus:-translate-y-4 left-4 pointer-events-none transition-all">
                        Password
                    </label>

                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-4 flex items-center text-slate-300 hover:text-warna-600">
                        <span id="eyeIcon"><i class="fa-solid fa-eye text-xs"></i></span>
                    </button>
                </div>
                @error('password')
                    <span class="text-rose-600 text-[10px] font-black uppercase italic mt-2 ml-2 tracking-widest block">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-6">
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="register"
                    class="w-full py-5 bg-[#0F172A] text-warna-500 rounded-2xl font-black text-xs uppercase tracking-[0.3em] italic hover:bg-slate-800 transition-all active:scale-[0.98] shadow-2xl shadow-slate-200 flex items-center justify-center gap-3">
                    
                    <i wire:loading wire:target="register" class="fas fa-spinner fa-spin"></i>

                    <span wire:loading.remove wire:target="register" class="flex items-center gap-2">
                        <i class="fas fa-user-plus text-[10px]"></i> Register Now
                    </span>
                    <span wire:loading wire:target="register">Processing...</span>
                </button>
            </div>

            <p class="text-center text-[11px] font-bold text-slate-400 uppercase italic tracking-widest mt-8">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-warna-600 hover:text-[#0F172A] underline underline-offset-4 ml-1 transition-colors">Masuk Sekarang</a>
            </p>
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