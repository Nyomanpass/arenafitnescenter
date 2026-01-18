<div class="max-w-md mx-auto bg-white p-10 rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.1)] border border-slate-50 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-24 h-24 bg-warna-500/5 rounded-bl-full"></div>
    
    <div class="flex items-center gap-3 mb-10">
        <div class="w-2 h-8 bg-[#0F172A] rounded-full"></div>
        <div>
            <h2 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter leading-none">
                Reset <span class="text-warna-500">Password</span>
            </h2>
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mt-1">Security Update System</p>
        </div>
    </div>

    @if($isNotificationModalOpen)
    <div class="fixed z-[60] inset-0 flex items-center justify-center bg-[#0F172A]/80 backdrop-blur-sm p-6">
        <div class="bg-white rounded-[2rem] shadow-2xl p-8 w-full max-w-sm text-center border-b-4 border-warna-500 animate-in fade-in zoom-in duration-300">
            <div class="w-16 h-16 bg-warna-500/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-shield-check text-warna-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-black text-[#0F172A] uppercase italic tracking-tight mb-2">{{ session('message.title') }}</h3>
            <p class="text-xs text-slate-500 font-medium mb-8 leading-relaxed">{{ session('message.description') }}</p>
            
            <button @click="show = false" wire:click="closeNotificationModal" 
                    class="w-full py-3 bg-[#0F172A] hover:bg-slate-800 text-warna-500 rounded-xl font-black text-[10px] uppercase tracking-widest italic transition-all active:scale-95 shadow-lg shadow-slate-200">
                Understood
            </button>
        </div>
    </div>
    @endif

    <form wire:submit.prevent="resetPassword" class="space-y-7">
        <div class="group">
            <div class="relative">
                <input type="password" id="old_password" wire:model.defer="old_password" 
                       class="block w-full px-5 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:outline-none focus:border-warna-500 focus:bg-white text-sm font-bold text-[#0F172A] transition-all peer" placeholder=" " />
                
                <label for="old_password" 
                       class="absolute text-[10px] font-black uppercase tracking-widest text-slate-400 italic duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-transparent px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-placeholder-shown:text-sm peer-focus:px-2 peer-focus:text-warna-600 peer-focus:italic peer-focus:font-black peer-focus:scale-75 peer-focus:-translate-y-4 left-4 pointer-events-none transition-all">
                    Current Password
                </label>

                <button type="button" onclick="togglePassword('old_password', 'eyeOld')" class="absolute inset-y-0 right-4 flex items-center text-slate-300 hover:text-warna-600 transition-colors">
                    <span id="eyeOld"><i class="fa-solid fa-eye-slash text-xs"></i></span>
                </button>
            </div>
            @error('old_password') <span class="text-rose-500 text-[9px] font-black uppercase italic mt-2 ml-2 tracking-widest block">{{ $message }}</span> @enderror
        </div>

        <div class="group">
            <div class="relative">
                <input type="password" id="new_password" wire:model.defer="new_password" 
                       class="block w-full px-5 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:outline-none focus:border-warna-500 focus:bg-white text-sm font-bold text-[#0F172A] transition-all peer" placeholder=" " />
                
                <label for="new_password" 
                       class="absolute text-[10px] font-black uppercase tracking-widest text-slate-400 italic duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-transparent px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-placeholder-shown:text-sm peer-focus:px-2 peer-focus:text-warna-600 peer-focus:italic peer-focus:font-black peer-focus:scale-75 peer-focus:-translate-y-4 left-4 pointer-events-none transition-all">
                    New Password
                </label>

                <button type="button" onclick="togglePassword('new_password', 'eyeNew')" class="absolute inset-y-0 right-4 flex items-center text-slate-300 hover:text-warna-600 transition-colors">
                    <span id="eyeNew"><i class="fa-solid fa-eye-slash text-xs"></i></span>
                </button>
            </div>
            @error('new_password') <span class="text-rose-500 text-[9px] font-black uppercase italic mt-2 ml-2 tracking-widest block">{{ $message }}</span> @enderror
        </div>

        <div class="relative">
            <input type="password" id="new_password_confirmation" wire:model.defer="new_password_confirmation" 
                   class="block w-full px-5 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:outline-none focus:border-warna-500 focus:bg-white text-sm font-bold text-[#0F172A] transition-all peer" placeholder=" " />
            
            <label for="new_password_confirmation" 
                   class="absolute text-[10px] font-black uppercase tracking-widest text-slate-400 italic duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-transparent px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-4 peer-placeholder-shown:text-sm peer-focus:px-2 peer-focus:text-warna-600 peer-focus:italic peer-focus:font-black peer-focus:scale-75 peer-focus:-translate-y-4 left-4 pointer-events-none transition-all">
                Confirm New Password
            </label>

            <button type="button" onclick="togglePassword('new_password_confirmation', 'eyeConfirm')" class="absolute inset-y-0 right-4 flex items-center text-slate-300 hover:text-warna-600 transition-colors">
                <span id="eyeConfirm"><i class="fa-solid fa-eye-slash text-xs"></i></span>
            </button>
        </div>

        <div class="pt-4">
            <button type="submit" 
                    class="w-full py-4 bg-[#0F172A] text-warna-500 rounded-2xl font-black text-xs uppercase tracking-[0.2em] italic hover:bg-slate-800 transition-all active:scale-[0.98] shadow-xl shadow-slate-200 flex items-center justify-center gap-3">
                <i class="fas fa-key text-[10px]"></i>
                Update Password
            </button>
        </div>
    </form>
</div>


<script>
    function togglePassword(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    }
</script>
