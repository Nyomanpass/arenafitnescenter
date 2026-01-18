<div>
  <div class="space-y-10">
    <div class="bg-white p-8 rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-slate-50 relative overflow-hidden">
        
        <div class="flex items-center gap-3 mb-10">
            <div class="w-2 h-8 bg-[#0F172A] rounded-full"></div>
            <div>
                <h2 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter">
                    Pengaturan <span class="text-warna-500">Harga Operasional</span>
                </h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Management Price Arena</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            @foreach(['harga_pengunjung_harian' => 'Local Harian', 'harga_pengunjung_harian_foreign' => 'Foreign Harian'] as $model => $label)
            <div class="group">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-2 block italic group-focus-within:text-warna-500 transition-colors">
                    {{ $label }}
                </label>
                <div class="relative">
                    <span class="absolute left-5 top-1/2 -translate-y-1/2 font-black text-[#0F172A] italic opacity-40">Rp</span>
                    <input type="number" wire:model.live="{{ $model }}" 
                           class="w-full pl-14 pr-6 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl text-sm font-black text-[#0F172A] focus:border-warna-500 focus:ring-0 transition-all italic shadow-sm" placeholder="0">
                </div>
            </div>
            @endforeach
        </div>

        <div class="space-y-6 mb-10">
            <h3 class="text-[11px] font-black text-[#0F172A] uppercase tracking-[0.3em] flex items-center italic">
                <span class="w-8 h-[1px] bg-warna-500 mr-3"></span> HARGA MEMBERSHIP LOCAL
            </h3>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(['local_1_week' => '1 Minggu', 'local_2_weeks' => '2 Minggu', 'local_3_weeks' => '3 Minggu', 'local_1_month' => '1 Bulan'] as $model => $label)
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-2 italic">{{ $label }}</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[10px] font-black text-[#0F172A] opacity-20 italic">Rp</span>
                        <input type="number" wire:model.live="{{ $model }}" class="w-full pl-10 pr-4 py-3 bg-white border-2 border-slate-50 rounded-xl text-xs font-black text-[#0F172A] focus:border-warna-500 focus:ring-0 transition-all italic shadow-sm">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="space-y-6 pt-8 border-t border-slate-50">
            <h3 class="text-[11px] font-black text-[#0F172A] uppercase tracking-[0.3em] flex items-center italic">
                <span class="w-8 h-[1px] bg-warna-500 mr-3"></span> HARGA MEMBERSHIP FOREIGN
            </h3>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(['foreign_1_week' => '1 Minggu', 'foreign_2_weeks' => '2 Minggu', 'foreign_3_weeks' => '3 Minggu', 'foreign_1_month' => '1 Bulan'] as $model => $label)
                <div class="space-y-1.5">
                    <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-2 italic">{{ $label }}</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[10px] font-black text-[#0F172A] opacity-20 italic">Rp</span>
                        <input type="number" wire:model.live="{{ $model }}" class="w-full pl-10 pr-4 py-3 bg-white border-2 border-slate-50 rounded-xl text-xs font-black text-[#0F172A] focus:border-warna-500 focus:ring-0 transition-all italic shadow-sm">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-12 flex justify-end">
            <button type="button" 
                wire:click="saveSettings"
                wire:loading.attr="disabled"
                {{-- Logic disabled dipertahankan sesuai kode asli Anda --}}
                @disabled($harga_membership_per_bulan == $original_harga_membership_per_bulan && $harga_pengunjung_harian == $original_harga_pengunjung_harian && $harga_pengunjung_harian_foreign == $original_harga_pengunjung_harian_foreign && $foreign_1_week == $original_foreign_1_week && $foreign_2_weeks == $original_foreign_2_weeks && $foreign_3_weeks == $original_foreign_3_weeks && $foreign_1_month == $original_foreign_1_month && $local_1_week == $original_local_1_week && $local_2_weeks == $original_local_2_weeks && $local_3_weeks == $original_local_3_weeks && $local_1_month == $original_local_1_month)
                class="w-full md:w-max px-10 py-4 bg-[#0F172A] text-warna-50 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-xl hover:bg-warna-500 hover:text-[#0F172A] transition-all active:scale-95 disabled:opacity-20 italic group border border-warna-500/20 cursor-pointer">
                
                <span wire:loading.remove wire:target="saveSettings">Simpan Pengaturan</span>
                <span wire:loading wire:target="saveSettings">
                    <i class="fas fa-spinner fa-spin mr-2"></i> Processing...
                </span>
            </button>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-slate-50">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-2 h-8 bg-[#0F172A] rounded-full"></div>
            <div>
                <h2 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter">
                    Pengaturan <span class="text-warna-500">Harga Produk</span>
                </h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Inventory Pricing</p>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse ($products as $item)
                <div class="group bg-white rounded-[2.5rem] p-5 border-2 border-slate-50 hover:border-warna-500/30 hover:shadow-2xl transition-all duration-500 flex flex-col relative overflow-hidden">
                    
                    <div class="relative aspect-square mb-5 rounded-[1.8rem] overflow-hidden bg-slate-100 shadow-inner">
                        @if($item->is_available == false)
                            <div class="absolute inset-0 bg-[#0F172A]/80 backdrop-blur-[2px] z-10 flex items-center justify-center p-4">
                                <span class="text-[9px] font-black text-warna-500 uppercase tracking-widest italic text-center leading-tight">OFFLINE</span>
                            </div>
                        @endif
                        <img src="/storage/{{ $item->image }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <div class="absolute top-3 right-3 z-20">
                            <button type="button" wire:click="toggleAvailableProduct({{ $item->id }})"
                                    class="w-8 h-8 rounded-full flex items-center justify-center transition-all shadow-lg {{ $item->is_available ? 'bg-white text-rose-500 hover:bg-rose-500 hover:text-white' : 'bg-warna-500 text-[#0F172A]' }}">
                                <i class="fas {{ $item->is_available ? 'fa-power-off' : 'fa-check' }} text-[10px]"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-xs font-black text-[#0F172A] uppercase italic line-clamp-1 mb-1">{{ $item->name }}</h3>
                        @if($item->description)
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter italic line-clamp-1 mb-5">{{ $item->description }}</p>
                        @endif
                        
                        <div class="space-y-3 mt-auto">
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[10px] font-black text-[#0F172A] opacity-30 italic">Rp</span>
                                <input type="number" wire:model.live="harga_produk.{{ $item->id }}"
                                       class="w-full pl-8 pr-2 py-2.5 bg-slate-50 border-none rounded-xl text-[11px] font-black text-[#0F172A] focus:ring-2 focus:ring-warna-500/50 transition-all italic shadow-inner">
                            </div>
                            
                            <div class="flex gap-2">
                                <button type="button" @disabled($harga_produk[$item->id] == $item->price)
                                        wire:click="updateProductPrice({{ $item->id }})"
                                        class="flex-1 py-2.5 bg-[#0F172A] text-warna-50 rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-warna-500 hover:text-[#0F172A] transition-all disabled:opacity-10 italic cursor-pointer">
                                    Simpan
                                </button>
                                <button type="button" @disabled($harga_produk[$item->id] == $item->price)
                                        wire:click="resetProductPrice({{ $item->id }})"
                                        class="w-10 bg-slate-100 text-slate-400 rounded-xl flex items-center justify-center hover:bg-rose-50 hover:text-rose-500 transition-all disabled:opacity-0 cursor-pointer">
                                    <i class="fas fa-undo-alt text-[10px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200 flex flex-col items-center justify-center opacity-40">
                    <i class="fas fa-box-open text-4xl mb-4 text-slate-300"></i>
                    <p class="text-[10px] font-black uppercase tracking-widest italic">Tidak ada produk</p>
                </div>
            @endforelse

            <button type="button" wire:click="toggleInputModal"
                    class="group rounded-[2.5rem] border-4 border-dashed border-slate-100 flex flex-col items-center justify-center gap-4 hover:bg-[#0F172A] hover:border-[#0F172A] transition-all duration-500 active:scale-95 p-10 cursor-pointer">
                <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-warna-500 group-hover:rotate-12 transition-all duration-500">
                    <i class="fas fa-plus text-[#0F172A]"></i>
                </div>
                <span class="text-[10px] font-black text-slate-400 group-hover:text-warna-50 uppercase tracking-[0.2em] italic transition-colors">Tambah Produk</span>
            </button>
        </div>
    </div>
</div>

    <!--modals-->
    @if($isInputModalOpen)
 @if($isInputModalOpen)
<div class="fixed z-[60] inset-0 flex items-center justify-center bg-[#0F172A]/40 backdrop-blur-md"
     x-data="{ show: false }" 
     x-init="$nextTick(() => show = true)">
    
    <div x-show="show" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-8"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         class="relative bg-white rounded-[3rem] shadow-[0_30px_100px_-20px_rgba(0,0,0,0.25)] mx-4 w-full max-w-lg overflow-hidden border border-white">
        
        <div class="p-10">
            <div class="mb-10 text-center">
                <div class="flex items-center justify-center gap-3 mb-2">
                    <div class="w-8 h-1 bg-warna-500 rounded-full"></div>
                    <h2 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter">
                        New <span class="text-warna-500">Product</span>
                    </h2>
                    <div class="w-8 h-1 bg-warna-500 rounded-full"></div>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em]">Inventory Registration System</p>
            </div>

            <form wire:submit.prevent="addProduct" class="space-y-6">
                <div class="relative group">
                    <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-2 block italic">Product Image</label>
                    
                    @if ($image)
                        <div class="relative w-full h-48 rounded-[2rem] overflow-hidden shadow-xl border-4 border-slate-50">
                            <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                            <button type="button" wire:click="removeImage" 
                                    class="absolute top-3 right-3 w-10 h-10 bg-rose-500 text-white rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform active:scale-95">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @else
                        <div onclick="document.getElementById('image').click()" 
                             class="w-full h-48 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2.5rem] flex flex-col items-center justify-center cursor-pointer hover:bg-slate-100 hover:border-warna-500/50 transition-all group">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-3 group-hover:scale-110 transition-transform duration-500">
                                <i class="fas fa-cloud-upload-alt text-2xl text-slate-300 group-hover:text-warna-500 transition-colors"></i>
                            </div>
                            <p class="text-[10px] font-black text-slate-400 group-hover:text-[#0F172A] uppercase tracking-widest italic">Drop product photo here</p>
                            <p class="text-[8px] text-slate-300 uppercase mt-1">PNG, JPG up to 2MB</p>
                        </div>
                    @endif
                    <input type="file" id="image" wire:model="image" accept="image/*" class="hidden">
                </div>

                <div class="space-y-5">
                    <div class="group">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-1 block italic group-focus-within:text-warna-500">Nama Produk</label>
                        <input type="text" wire:model="name" placeholder="E.G. WHEY PROTEIN ISOLATE"
                               class="w-full bg-slate-50 border-2 border-transparent focus:border-warna-500 focus:bg-white rounded-2xl px-6 py-4 text-[13px] font-black text-[#0F172A] transition-all uppercase italic shadow-sm outline-none">
                    </div>

                    <div class="group">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-1 block italic group-focus-within:text-warna-500">Harga Jual</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 font-black text-[#0F172A] italic opacity-30">Rp</span>
                            <input type="number" wire:model="price" placeholder="0"
                                   class="w-full pl-14 pr-6 py-4 bg-slate-50 border-2 border-transparent focus:border-warna-500 focus:bg-white rounded-2xl text-[13px] font-black text-[#0F172A] transition-all italic shadow-sm outline-none">
                        </div>
                    </div>

                    <div class="group">
                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest ml-4 mb-1 block italic group-focus-within:text-warna-500">Deskripsi (Opsional)</label>
                        <input type="text" wire:model="description" placeholder="SHORT PRODUCT INFO..."
                               class="w-full bg-slate-50 border-2 border-transparent focus:border-warna-500 focus:bg-white rounded-2xl px-6 py-4 text-[13px] font-black text-[#0F172A] transition-all italic shadow-sm outline-none uppercase">
                    </div>
                </div>

                <div class="mt-10 flex gap-4">
                    <button type="button" wire:click="toggleInputModal" 
                            class="flex-1 py-4 text-slate-400 text-[11px] font-black uppercase tracking-widest hover:text-rose-500 transition-colors italic">
                        Cencel
                    </button>
                    <button type="submit" 
                            class="flex-[2] py-4 bg-[#0F172A] text-warna-50 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-xl hover:bg-warna-500 hover:text-[#0F172A] transition-all transform hover:-translate-y-1 active:scale-95 italic">
                        Simpan Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
    @endif


    @if($isNotificationModalOpen)
     <div class="fixed z-50 inset-0 flex items-center justify-center bg-warna-300/50 ">
       <x-notification-modal class="relative bg-white rounded-lg shadow-lg p-6 mx-7 md:mx-0 w-full max-w-md text-center">
            <x-slot name="title">{{ session('message.title') }}</x-slot>
            <x-slot name="description">{{ session('message.description') }}</x-slot>
            <x-slot name="button">
                <button @click="show = false" wire:click="closeNotificationModal" class="px-12 py-2 bg-warna-200/60 hover:bg-warna-200/80 active:scale-95 transition-all text-warna-50 rounded-lg">OK</button>
            </x-slot>
        </x-notification-modal>
     </div>
    @endif
</div>
