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

   <form wire:submit.prevent="resetPassword" class="space-y-6">
    
    <div class="relative group mt-4">
        <input type="password" id="old_password" wire:model.defer="old_password" 
            class="block w-full pl-12 pr-14 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="Current Password" required/>
        
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
            <i class="fa-solid fa-lock-open text-sm"></i>
        </div>

        <label for="old_password" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            Current Password
        </label>

        <button type="button" onclick="togglePassword('old_password', 'eyeOld')" 
            class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-300 hover:text-warna-500 transition-colors">
            <span id="eyeOld"><i class="fa-solid fa-eye-slash text-sm"></i></span>
        </button>

        @error('old_password') 
            <span class="text-rose-600 text-[9px] font-black uppercase italic mt-1 ml-4 tracking-widest block">{{ $message }}</span> 
        @enderror
    </div>

    <div class="relative group mt-2">
        <input type="password" id="new_password" wire:model.defer="new_password" 
            class="block w-full pl-12 pr-14 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="New Password" required/>
        
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
            <i class="fa-solid fa-key text-sm"></i>
        </div>

        <label for="new_password" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            New Password
        </label>

        <button type="button" onclick="togglePassword('new_password', 'eyeNew')" 
            class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-300 hover:text-warna-500 transition-colors">
            <span id="eyeNew"><i class="fa-solid fa-eye-slash text-sm"></i></span>
        </button>

        @error('new_password') 
            <span class="text-rose-600 text-[9px] font-black uppercase italic mt-1 ml-4 tracking-widest block">{{ $message }}</span> 
        @enderror
    </div>

    <div class="relative group mt-2">
        <input type="password" id="new_password_confirmation" wire:model.defer="new_password_confirmation" 
            class="block w-full pl-12 pr-14 py-4 bg-white border-2 border-slate-200 rounded-2xl text-[#0F172A] font-black italic text-sm transition-all focus:outline-none focus:border-warna-500 focus:ring-0 peer placeholder-transparent" 
            placeholder="Confirm Password" required/>
        
           <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 peer-focus:text-warna-500 transition-colors">
                <i class="fa-solid fa-shield-halved text-sm"></i>
            </div>

        <label for="new_password_confirmation" 
            class="absolute left-10 -top-2.5 px-2 bg-white text-[10px] font-black text-warna-500 uppercase tracking-widest italic transition-all 
            peer-placeholder-shown:text-sm peer-placeholder-shown:text-slate-400 peer-placeholder-shown:top-4 peer-placeholder-shown:left-12 peer-placeholder-shown:font-bold
            peer-focus:-top-2.5 peer-focus:left-10 peer-focus:text-[10px] peer-focus:text-warna-500 peer-focus:font-black
            pointer-events-none">
            Confirm Password
        </label>

        <button type="button" onclick="togglePassword('new_password_confirmation', 'eyeConfirm')" 
            class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-300 hover:text-warna-500 transition-colors">
            <span id="eyeConfirm"><i class="fa-solid fa-eye-slash text-sm"></i></span>
        </button>
    </div>

    <div class="pt-4">
        <button type="submit" 
            class="group relative w-full py-5 bg-[#0F172A] text-warna-500 font-black uppercase tracking-[0.3em] text-[10px] italic rounded-2xl overflow-hidden transition-all duration-300 hover:bg-slate-800 shadow-[0_10px_30px_rgba(15,23,42,0.3)] active:scale-[0.97] flex items-center justify-center gap-3">
            <i class="fas fa-lock text-[10px]"></i>
            UPDATE SECURITY KEY
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
