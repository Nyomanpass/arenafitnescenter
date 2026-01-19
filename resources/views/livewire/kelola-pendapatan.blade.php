<div class="">
    <div class="flex gap-3">
        <div class="w-full xl:w-[70%] p-6 bg-white rounded-[1rem]">
            <div class="flex items-center justify-between mb-8">
                  <div class="flex items-center gap-3">
                    <div class="w-2 h-8 bg-[#0F172A] rounded-full"></div>
                    <div>
                        <h2 class="text-2xl font-black text-[#0F172A] uppercase italic tracking-tighter leading-none">
                            Tambah Data <span class="text-warna-500">Transaksi</span>
                        </h2>
                       
                    </div>
                </div>

                {{-- @if($isNotificationModalOpen)
                    <div>
                        <p>{{ session('message.description') }}</p>
                    </div>
                @endif --}}
                @if ($errors->any())
                    <div class="relative inline-block">
                        <button type="button" 
                                class="flex items-center justify-center w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-full transition-colors duration-200"
                                x-data="{ showErrors: false }"
                                @mouseenter="showErrors = true"
                                @mouseleave="showErrors = false"
                                @click="showErrors = !showErrors">
                            <i class="fas fa-exclamation-triangle text-sm"></i>
                            
                            <!-- Tooltip with errors -->
                            <div x-show="showErrors"
                                 x-cloak
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="absolute top-10 right-0 z-50 w-64 bg-white border border-red-200 rounded-lg shadow-lg p-3">
                                <div class="text-red-600 text-sm">
                                    <div class="font-semibold mb-2">Error:</div>
                                    <ul class="space-y-1 text-xs">
                                        @foreach ($errors->all() as $error)
                                            <li class="flex items-start">
                                                <i class="fas fa-circle text-xs mt-1.5 mr-2 text-warna-900"></i>
                                                <span class="text-left">{{ $error }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Arrow pointing up -->
                                <div class="absolute -top-2 right-3 w-4 h-4 bg-white border-l border-t border-red-200 transform rotate-45"></div>
                            </div>
                        </button>
                    </div>
                @endif
            </div>
            <form wire:submit.prevent="save" class="space-y-5">
                <x-g-input 
                    id="transaction_type"
                    label="Tipe Transaksi"
                    type="select"
                    name="transaction_type"
                    wire:model.live="transaction_type"
                    :options="[
                        'membership_payment' => 'Pembayaran Membership',
                        'daily_visit_fee' => 'Pengunjung Harian', 
                        'additional_items_sale' => 'Additional Item',
                    ]"
                />
                

                @if ($transaction_type === 'membership_payment')
                    <!-- Pilih Member -->
                    <x-g-input 
                        label="Pilih Member"
                        type="searchable-select"
                        name="selectedMember"
                        wire:model.live="selectedMember"
                        :options="$memberOptions"
                        placeholder="Pilih Member..."
                        search-placeholder="Cari nama atau email member..."
                        display-key="name"
                        value-key="id"
                        :search-keys="['name', 'email']"
                        no-results-text="Tidak ada member ditemukan"
                    />


                    @if($selectedMember && $selectedMemberData)

                        <!-- Member Type (muncul jika member belum punya member_type) -->
                        @if(!$selectedMemberData->member_type)
                            <x-g-input 
                                label="Jenis Member"
                                type="select"
                                name="member_type"
                                wire:model.live="member_type"
                                :options="$memberTypeOptions"
                                
                            />
                        @else
                            <x-g-input 
                                label="Jenis Member"
                                type="text"
                                value="{{ $selectedMemberData->member_type }}"
                                disabled
                                class="disabled:bg-gray-100 disabled:text-gray-700 disabled:cursor-not-allowed"
                            />
                        @endif

                        <!-- Durasi Membership (muncul untuk semua member type) -->
                        @if($member_type || $selectedMemberData->member_type)
                            <x-g-input 
                                label="Durasi Keanggotaan"
                                type="select"
                                name="duration_membership"
                                wire:model.live="duration_membership"
                                :options="$durationOptions"
                            />
                        @endif

                    @endif

                @elseif($transaction_type === 'additional_items_sale')
                    <p class="text-xs text-warna-200/80 mb-4">Semua Produk</p>
                    <!--grid card semua produk-->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                        @forelse($products as $product)
                            <div class="bg-white border border-gray-200 rounded-lg p-3 hover:shadow-md transition-shadow cursor-pointer"
                                wire:click="addProductToCart({{ $product->id }})">
                                <div class="aspect-square mb-2">
                                    @if($product->image)
                                        <img src="/storage/{{ $product->image }}" 
                                            alt="{{ $product->name }}" 
                                            class="w-full h-full object-cover rounded-lg">
                                    @else
                                        <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <h4 class="font-semibold text-sm text-gray-800 mb-1 line-clamp-2">{{ $product->name }}</h4>
                                
                                @if($product->description)
                                    <p class="text-xs text-gray-500 mb-2 line-clamp-1">{{ $product->description }}</p>
                                @endif
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-bold text-warna-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                    
                                    @if(isset($selectedProducts[$product->id]))
                                        <span class="bg-warna-500 text-white text-xs px-2 py-1 rounded-full">
                                            {{ $selectedProducts[$product->id]['quantity'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8">
                                <i class="fas fa-box-open text-gray-400 text-3xl mb-3"></i>
                                <p class="text-gray-500">Tidak ada produk tersedia</p>
                            </div>
                        @endforelse
                    </div>
                @elseif($transaction_type === 'daily_visit_fee')
                    <x-g-input 
                        label="Tipe Pengunjung"
                        type="select"
                        name="visitor_type"
                        wire:model.live="visitor_type"
                        :options="[
                            'local' => 'Local',
                            'foreign' => 'Foreign'
                        ]"
                    />
                @endif
                <x-g-input 
                    label="Deskripsi (Opsional)"
                    type="text"
                    name="description"
                    wire:model.live="description"
                    
                />

                <x-g-input 
                    label="Metode Pembayaran"
                    type="select"
                    name="payment_method"
                    wireModel="payment_method"
                    :options="[
                        'cash' => 'Tunai',
                        'qris' => 'QRIS',
                    ]"
                    
                />
                
                <button type="submit" 
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50"
                        class="mt-4 w-full bg-warna-300 text-white font-semibold py-2 md:py-3 px-4 rounded-lg hover:bg-warna-500 hover:text-slate-800 transition-colors duration-200">
                    <span wire:loading.remove>Simpan</span>
                    <span wire:loading>Menyimpan...</span>
                </button>
            </form>
            
        </div>

        <div class="hidden xl:block w-full lg:w-1/3 bg-white rounded-[1rem] p-6">
            <p class="text-lg lg:text-xl font-semibold mb-8">Detail Transaksi</p>
            
            @if($transaction_type === 'additional_items_sale' && !empty($selectedProducts))
                <div class="space-y-4">
                    <!-- Header Produk Terpilih -->
                    <div class="border-b pb-3">
                        <h4 class="font-semibold text-gray-800">Produk Terpilih</h4>
                    </div>
                    
                    <!-- List Produk -->
                    <div class="space-y-3 max-h-60 overflow-y-auto">
                        @foreach($selectedProducts as $productId => $item)
                            <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                <div class="flex-1 min-w-0">
                                    <h5 class="text-sm font-medium text-gray-900 truncate">{{ $item['name'] }}</h5>
                                    <p class="text-xs text-gray-500">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                
                                <div class="flex items-center space-x-2">
                                    <!-- Quantity Controls -->
                                    <div class="flex items-center space-x-1">
                                        <button type="button" 
                                                wire:click="updateQuantity({{ $productId }}, {{ $item['quantity'] - 1 }})"
                                                class="w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center text-xs">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        
                                        <span class="w-8 text-center text-sm font-medium">{{ $item['quantity'] }}</span>
                                        
                                        <button type="button" 
                                                wire:click="updateQuantity({{ $productId }}, {{ $item['quantity'] + 1 }})"
                                                class="w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center text-xs">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Remove Button -->
                                    <button type="button" 
                                            wire:click="removeProduct({{ $productId }})"
                                            class="w-6 h-6 bg-red-100 hover:bg-red-200 text-red-600 rounded-full flex items-center justify-center text-xs">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Subtotal -->
                            <div class="text-right text-sm text-gray-600 mt-1">
                                Subtotal: Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Total -->
                    <div class="border-t pt-3">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-gray-800">Total:</span>
                            <span class="text-lg font-bold text-warna-600">
                                Rp {{ number_format($totalAmount, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            @elseif($transaction_type === 'membership_payment' && $selectedMember && $selectedMemberData)
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h4 class="font-semibold text-gray-800 mb-3">Ringkasan Pembayaran</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tipe:</span>
                                <span class="font-medium">Pembayaran Membership</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Member:</span>
                                <span class="font-medium">{{ $selectedMemberData->name }}</span>
                            </div>
                            @if($member_type || $selectedMemberData->member_type)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jenis:</span>
                                    <span class="font-medium">{{ ucfirst($member_type ?: $selectedMemberData->member_type) }}</span>
                                </div>
                            @endif
                            @if($duration_membership)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Durasi:</span>
                                    <span class="font-medium">{{ $durationOptions[$duration_membership] ?? $duration_membership }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($membershipTotal > 0)
                        <div class="border-t pt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-800">Total:</span>
                                <span class="text-lg font-bold text-warna-600">
                                    Rp {{ number_format($membershipTotal, 0, ',', '.') }}
                                </span>
                            </div>
                            
                            <div class="mt-2 text-xs text-gray-500">
                                <p>* Harga {{ ucfirst($member_type ?: $selectedMemberData->member_type) }} - 
                                @switch($duration_membership)
                                    @case('one_week')
                                        1 Minggu
                                        @break
                                    @case('two_weeks')
                                        2 Minggu
                                        @break
                                    @case('three_weeks')
                                        3 Minggu
                                        @break
                                    @case('one_month')
                                        1 Bulan
                                        @break
                                @endswitch
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            @elseif($transaction_type === 'daily_visit_fee')
                <div class="space-y-4">
                    <div class="mb-7 md:mb-9">
                        <h4 class="font-semibold text-gray-800 mb-3">Ringkasan Pengunjung Harian</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tipe:</span>
                                <span class="font-medium">Pengunjung Harian</span>
                            </div>
                            <!-- ✅ TAMBAHKAN: Info tipe pengunjung -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tipe Pengunjung:</span>
                                <span class="font-medium">{{ ucfirst($visitor_type) }}</span>
                            </div>
                            @if($description)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Deskripsi:</span>
                                    <span class="font-medium">{{ $description }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="border-t pt-3">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-gray-800">Total:</span>
                            <span class="text-lg font-bold text-warna-600">
                                Rp {{ number_format($dailyVisitTotal, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class="mt-2 text-xs text-gray-500">
                            <!-- ✅ UPDATE: Tunjukkan tipe dalam keterangan -->
                            <p>* Tarif pengunjung harian {{ $visitor_type }} per orang</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-receipt text-gray-400 text-3xl mb-3"></i>
                    <p class="text-gray-500">Detail transaksi akan muncul di sini</p>
                </div>
            @endif
        </div>

    </div>

    <div class="hidden lg:block mt-10 h-full rounded-lg">
        <!-- Total Transaksi Hari Ini -->
        <div class="mb-12">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $transactionStats = [
                        [
                            'label' => 'Total Keseluruhan',
                            'amount' => $totalToday,
                            'icon' => 'fa-chart-line',
                            'bg_icon' => 'bg-[#0F172A]',
                            'text_icon' => 'text-warna-500'
                        ],
                        [
                            'label' => 'Membership',
                            'amount' => $membershipToday,
                            'icon' => 'fa-users',
                            'bg_icon' => 'bg-white',
                            'text_icon' => 'text-slate-400'
                        ],
                        [
                            'label' => 'Produk',
                            'amount' => $otherToday,
                            'icon' => 'fa-shopping-cart',
                            'bg_icon' => 'bg-white',
                            'text_icon' => 'text-slate-400'
                        ],
                    ];
                @endphp

                @foreach($transactionStats as $stat)
                <div class="group bg-white border border-slate-100 p-8 rounded-[1rem] shadow-[0_15px_40px_-12px_rgba(0,0,0,0.1)] transition-all duration-500 hover:-translate-y-3 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] relative overflow-hidden">
                    
                    <div class="relative z-10 flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 group-hover:text-warna-500 transition-colors">
                                {{ $stat['label'] }}
                            </p>
                            <p class="text-3xl font-black text-[#0F172A] tracking-tighter italic">
                                <span class="text-sm font-bold not-italic mr-1 text-slate-300">Rp</span>{{ number_format($stat['amount'] ?? 0, 0, ',', '.') }}
                            </p>
                        </div>
                        
                        <div class="w-16 h-16 {{ $stat['bg_icon'] }} rounded-2xl flex items-center justify-center shadow-[6px_6px_15px_rgba(0,0,0,0.05),-6px_-6px_15px_rgba(255,255,255,0.8)] border border-slate-50 transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                            <i class="fas {{ $stat['icon'] }} {{ $stat['text_icon'] }} text-2xl"></i>
                        </div>
                    </div>

                
                </div>
                @endforeach
            </div>
        </div>
        <!-- Riwayat Transaksi Hari Ini -->
        <div class="bg-white rounded-[1rem] border border-white shadow-[0_20px_50px_-20px_rgba(0,0,0,0.1)] overflow-hidden transition-all duration-300">
            <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
               
                 <div class="flex items-center mb-8">
                <div class="w-1.5 h-6 bg-warna-500 rounded-full mr-3 shadow-[0_0_10px_rgba(16,185,129,0.5)]"></div>
                <h3 class="text-lg font-black text-[#0F172A] uppercase tracking-tighter italic">
                    Revenue <span class="text-warna-500">Today</span>
                </h3>
            </div>
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100 shadow-sm">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mr-2">Show</label>
                        
                        <div class="relative flex items-center">
                            <select wire:model.live="perPage" 
                                    class="bg-transparent bg-none appearance-none [-webkit-appearance:none] [-moz-appearance:none] text-sm font-black text-[#0F172A] border-none focus:ring-0 focus:outline-none cursor-pointer py-0 pl-0 pr-6 z-10 relative">
                                <option value="5">05</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="25">25</option>
                            </select>
                            
                            <i class="fa-solid fa-chevron-down text-[9px] text-slate-400 absolute right-0 pointer-events-none"></i>
                        </div>
                    </div>
                    
                    <div class="bg-slate-800 px-4 py-2 rounded-2xl">
                        <span class="text-[10px] font-black uppercase tracking-widest text-white">
                            Total: {{ count($todayTransactions ?? []) }} Transaksi
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Waktu</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kategori</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Deskripsi</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Metode</th>
                            <th class="px-6 py-4 text-right text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Nominal</th>
                            <th class="px-6 py-4 text-center text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($todayTransactions ?? [] as $transaction)
                            <tr class="group hover:bg-slate-50 transition-all duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-black text-[#0F172A] italic">
                                        {{ $transaction->transaction_datetime->format('H:i') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $typeClasses = [
                                            'membership_payment' => 'bg-slate-900 text-white',
                                            'daily_visit_fee' => 'bg-warna-500 text-slate-800',
                                            'additional_items_sale' => 'bg-slate-100 text-slate-600'
                                        ];
                                        $currentClass = $typeClasses[$transaction->transaction_type] ?? 'bg-slate-100 text-slate-600';
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest {{ $currentClass }} shadow-sm">
                                        <i class="fas {{ $transaction->transaction_type === 'membership_payment' ? 'fa-users' : ($transaction->transaction_type === 'daily_visit_fee' ? 'fa-clock' : 'fa-shopping-cart') }} mr-2 opacity-70"></i>
                                        {{ $transaction->transaction_type === 'membership_payment' ? 'Membership' : ($transaction->transaction_type === 'daily_visit_fee' ? 'Harian' : 'Produk') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-xs font-bold text-slate-500 truncate max-w-[200px]">
                                        {{ $transaction->description ?: 'Tanpa keterangan' }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-[10px] font-black uppercase tracking-widest {{ $transaction->payment_method === 'cash' ? 'text-emerald-500' : 'text-blue-500' }}">
                                        <i class="fas {{ $transaction->payment_method === 'cash' ? 'fa-money-bill' : 'fa-qrcode' }} mr-1"></i>
                                        {{ $transaction->payment_method }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="text-sm font-black text-[#0F172A] italic">
                                        Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button wire:click="confirmDeleteTransaction({{ $transaction->id }})" class="w-10 h-10 bg-rose-50 hover:bg-rose-500 text-rose-500 hover:text-white rounded-xl transition-all duration-300 flex items-center justify-center group/btn shadow-sm">
                                        <i class="fas fa-trash-alt text-xs group-hover/btn:scale-110 transition-transform"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center opacity-20">
                                        <i class="fas fa-receipt text-6xl mb-4"></i>
                                        <p class="text-xs font-black uppercase tracking-[0.3em]">Belum Ada Transaksi</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-8 bg-slate-50/50 border-t border-slate-50 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                    Halaman {{ $todayTransactions->currentPage() }} Dari {{ $todayTransactions->lastPage() }}
                </div>
                
                <div class="flex items-center gap-2">
                    {{-- Tombol Navigasi Manual atau Menggunakan $todayTransactions->links() --}}
                    <button wire:click="previousPage" class="p-3 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-warna-500 shadow-sm transition-all disabled:opacity-30" {{ $todayTransactions->onFirstPage() ? 'disabled' : '' }}>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="px-4 py-2 bg-[#0F172A] rounded-xl text-xs font-black text-white italic">
                        {{ $todayTransactions->currentPage() }}
                    </div>
                    <button wire:click="nextPage" class="p-3 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-warna-500 shadow-sm transition-all disabled:opacity-30" {{ !$todayTransactions->hasMorePages() ? 'disabled' : '' }}>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

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

    <!--sliding invoice transaction with overlay-->
    <div x-data="{ sidebarOpen: false }" class="relative">
        <!-- Toggle Button -->
        @if($transaction_type)
        <button @click="sidebarOpen = !sidebarOpen" 
            x-show="!sidebarOpen"
            x-cloak
            x-transition:enter="transition-all ease-in-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full"
            class="fixed top-24 right-0 bg-warna-500 text-black px-4 py-2 rounded-l-full hover:bg-warna-500 transition-colors z-50 xl:hidden">
            <i class="fa-solid fa-receipt text-lg"></i>
        </button>
        @endif

        <!-- Overlay -->
        <div x-show="sidebarOpen" 
             x-cloak
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-warna-300/50 z-[48] xl:hidden">
        </div>

        <!-- Sliding Sidebar -->
        <div x-show="sidebarOpen" 
             x-cloak
             x-transition:enter="transition-transform ease-in-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition-transform ease-in-out duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 w-full max-w-md bg-white shadow-lg z-[52] overflow-y-auto xl:hidden">
            
            <!-- Header -->
            <div class="sticky top-0 bg-white border-b p-6 pb-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg md:text-xl font-semibold">Detail Transaksi</h3>
                    <button @click="sidebarOpen = false" 
                            class="text-gray-600 hover:text-gray-800 transition-colors">
                        <i class="fa-solid fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6 pt-4">
                @if($transaction_type === 'additional_items_sale' && !empty($selectedProducts))
                    <div class="space-y-4">
                        <!-- Header Produk Terpilih -->
                        <div class="border-b pb-3">
                            <h4 class="font-semibold text-gray-800">Produk Terpilih</h4>
                        </div>
                        
                        <!-- List Produk -->
                        <div class="space-y-3">
                            @foreach($selectedProducts as $productId => $item)
                                <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                    <div class="flex-1 min-w-0">
                                        <h5 class="text-sm font-medium text-gray-900 truncate">{{ $item['name'] }}</h5>
                                        <p class="text-xs text-gray-500">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <!-- Quantity Controls -->
                                        <div class="flex items-center space-x-1">
                                            <button type="button" 
                                                    wire:click="updateQuantity({{ $productId }}, {{ $item['quantity'] - 1 }})"
                                                    class="w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center text-xs">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            
                                            <span class="w-8 text-center text-sm font-medium">{{ $item['quantity'] }}</span>
                                            
                                            <button type="button" 
                                                    wire:click="updateQuantity({{ $productId }}, {{ $item['quantity'] + 1 }})"
                                                    class="w-6 h-6 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center text-xs">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        
                                        <!-- Remove Button -->
                                        <button type="button" 
                                                wire:click="removeProduct({{ $productId }})"
                                                class="w-6 h-6 bg-red-100 hover:bg-red-200 text-red-600 rounded-full flex items-center justify-center text-xs">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Subtotal -->
                                <div class="text-right text-sm text-gray-600 mt-1">
                                    Subtotal: Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Total -->
                        <div class="border-t pt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-800">Total:</span>
                                <span class="text-lg font-bold text-warna-600">
                                    Rp {{ number_format($totalAmount, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @elseif($transaction_type === 'membership_payment' && $selectedMember && $selectedMemberData)
                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Ringkasan Pembayaran</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tipe:</span>
                                    <span class="font-medium">Pembayaran Membership</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Member:</span>
                                    <span class="font-medium">{{ $selectedMemberData->name }}</span>
                                </div>
                                @if($member_type || $selectedMemberData->member_type)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Jenis:</span>
                                        <span class="font-medium">{{ ucfirst($member_type ?: $selectedMemberData->member_type) }}</span>
                                    </div>
                                @endif
                                @if($duration_membership)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Durasi:</span>
                                        <span class="font-medium">{{ $durationOptions[$duration_membership] ?? $duration_membership }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if($membershipTotal > 0)
                            <div class="border-t pt-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold text-gray-800">Total:</span>
                                    <span class="text-lg font-bold text-warna-600">
                                        Rp {{ number_format($membershipTotal, 0, ',', '.') }}
                                    </span>
                                </div>
                                
                                <div class="mt-2 text-xs text-gray-500">
                                    <p>* Harga {{ ucfirst($member_type ?: $selectedMemberData->member_type) }} - 
                                    @switch($duration_membership)
                                        @case('one_week')
                                            1 Minggu
                                            @break
                                        @case('two_weeks')
                                            2 Minggu
                                            @break
                                        @case('three_weeks')
                                            3 Minggu
                                            @break
                                        @case('one_month')
                                            1 Bulan
                                            @break
                                    @endswitch
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                @elseif($transaction_type === 'daily_visit_fee')
                    <div class="space-y-4">
                        <div class="mb-7">
                            <h4 class="font-semibold text-gray-800 mb-3">Ringkasan Pengunjung Harian</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tipe:</span>
                                    <span class="font-medium">Pengunjung Harian</span>
                                </div>
                                @if($description)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Deskripsi:</span>
                                        <span class="font-medium">{{ $description }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="border-t pt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-800">Total:</span>
                                <span class="text-lg font-bold text-warna-600">
                                    Rp {{ number_format($dailyVisitTotal, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="mt-2 text-xs text-gray-500">
                                <p>* Tarif pengunjung harian per orang</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-receipt text-gray-400 text-3xl mb-3"></i>
                        <p class="text-gray-500">Detail transaksi akan muncul di sini</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Sliding Table Section with Overlay -->
    <div x-cloak x-data="{ showTable: false }">
        <!-- overlay -->
         <div x-show="showTable" 
            x-cloak
            x-transition:enter="transition-opacity ease-linear duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 bg-warna-300/50 bg-opacity-50 z-[48]">
        </div>
        
        <div class="fixed lg:hidden  z-50 bottom-0 left-0 right-0 w-full bg-warna-50 border-t-2 border-warna-100 transition-transform duration-300 ease-in-out"
             :class="showTable ? 'transform translate-y-0' : 'transform translate-y-full'">
         
            <!-- Toggle Button -->
            <button @click="showTable = !showTable"
                    class="absolute -top-10 right-4 bg-warna-500 text-black px-4 py-2 rounded-t-lg hover:bg-warna-500 transition-colors">
                <i class="fa-solid fa-angle-up text-lg transition-transform duration-300" 
                :class="showTable ? 'rotate-180' : ''"></i>
            </button>


            <!-- Table Content -->
            <div class="p-4 md:p-6 max-h-96 overflow-y-auto">
                <!-- Total Transaksi Hari Ini -->
                <div class="mb-8 px-2 lg:hidden"> <div class="flex items-center mb-6">
                        <div class="w-1 h-5 bg-warna-500 rounded-full mr-3 shadow-[0_0_8px_rgba(16,185,129,0.4)]"></div>
                        <h3 class="text-sm font-black text-[#0F172A] uppercase tracking-tighter italic">
                            Revenue <span class="text-warna-500">Today</span>
                        </h3>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="group bg-white border border-slate-100 p-5 rounded-[2rem] shadow-[0_10px_25px_-10px_rgba(0,0,0,0.1)] active:scale-95 transition-all duration-300 relative overflow-hidden">
                            <div class="relative z-10 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-[#0F172A] rounded-2xl flex items-center justify-center shadow-lg shadow-slate-900/20">
                                        <i class="fas fa-chart-line text-warna-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-[9px] font-black uppercase tracking-widest text-slate-400">Total Keseluruhan</p>
                                        <p class="text-xl font-black text-[#0F172A] italic">
                                            <span class="text-[10px] not-italic mr-0.5 opacity-50 font-bold">Rp</span>{{ number_format($totalToday ?? 0, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-slate-200 text-xs"></i>
                            </div>
                            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-warna-500/5 rounded-full blur-xl"></div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white border border-slate-100 p-5 rounded-[2rem] shadow-[0_10px_25px_-10px_rgba(0,0,0,0.1)] active:scale-95 transition-all">
                                <div class="flex flex-col items-center text-center">
                                    <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center mb-3">
                                        <i class="fas fa-users text-slate-400 text-sm"></i>
                                    </div>
                                    <p class="text-[8px] font-black uppercase tracking-widest text-slate-400 mb-1">Membership</p>
                                    <p class="text-sm font-black text-[#0F172A] italic">
                                        {{ number_format($membershipToday ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="bg-white border border-slate-100 p-5 rounded-[2rem] shadow-[0_10px_25px_-10px_rgba(0,0,0,0.1)] active:scale-95 transition-all">
                                <div class="flex flex-col items-center text-center">
                                    <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center mb-3">
                                        <i class="fas fa-shopping-cart text-slate-400 text-sm"></i>
                                    </div>
                                    <p class="text-[8px] font-black uppercase tracking-widest text-slate-400 mb-1">Produk & Harian</p>
                                    <p class="text-sm font-black text-[#0F172A] italic">
                                        {{ number_format($otherToday ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Riwayat Transaksi -->
               <div class="space-y-4">
    <div class="flex items-center justify-between px-2">
        <div class="flex items-center gap-2">
            <div class="w-1.5 h-6 bg-warna-500 rounded-full"></div>
            <h3 class="text-sm font-black text-[#0F172A] uppercase italic tracking-widest">Riwayat Transaksi</h3>
        </div>
        <div class="px-3 py-1 bg-[#0F172A] rounded-lg shadow-sm">
            <span class="text-[10px] font-black text-warna-500 uppercase italic">
                {{ count($todayTransactions ?? []) }} Transaksi
            </span>
        </div>
    </div>
    
    <div class="space-y-3">
        @forelse($todayTransactions ?? [] as $transaction)
            <div class="bg-white border-l-4 border-l-warna-500 rounded-2xl p-4 shadow-[0_4px_15px_-3px_rgba(0,0,0,0.05)] border border-slate-100 relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-slate-50 rounded-full group-hover:bg-warna-500/10 transition-colors duration-300"></div>

                <div class="flex justify-between items-center relative z-10">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-black uppercase tracking-tighter italic
                                {{ $transaction->transaction_type === 'membership_payment' ? 'bg-blue-500 text-white' : 
                                   ($transaction->transaction_type === 'daily_visit_fee' ? 'bg-warna-500 text-[#0F172A]' : 'bg-purple-600 text-white') }}">
                                @switch($transaction->transaction_type)
                                    @case('membership_payment')
                                        <i class="fas fa-users mr-1"></i> Membership
                                        @break
                                    @case('daily_visit_fee')
                                        <i class="fas fa-bolt mr-1"></i> Harian
                                        @break
                                    @case('additional_items_sale')
                                        <i class="fas fa-box mr-1"></i> Produk
                                        @break
                                @endswitch
                            </span>
                            <span class="text-[10px] font-bold text-slate-400 italic">
                                <i class="far fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($transaction->created_at)->format('H:i') }}
                            </span>
                        </div>
                        
                        <h4 class="text-xs font-black text-slate-800 uppercase italic tracking-tight truncate w-40">
                            {{ $transaction->description ? Str::limit($transaction->description, 35) : 'Tanpa Keterangan' }}
                        </h4>
                        
                        <div class="mt-2">
                            <span class="text-[9px] font-black uppercase italic tracking-widest px-2 py-0.5 rounded border
                                {{ $transaction->payment_method === 'cash' ? 'border-emerald-200 text-emerald-600 bg-emerald-50' : 'border-blue-200 text-blue-600 bg-blue-50' }}">
                                <i class="fas {{ $transaction->payment_method === 'cash' ? 'fa-wallet' : 'fa-qrcode' }} mr-1"></i>
                                {{ $transaction->payment_method === 'cash' ? 'Tunai' : 'QRIS' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <p class="text-[10px] text-slate-400 font-bold uppercase italic leading-none mb-1 text-warna-500">Amount</p>
                        <p class="text-base font-black text-[#0F172A] italic tracking-tighter">
                            <span class="text-xs">Rp</span>{{ number_format($transaction->total_amount, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-12 bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200">
                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-receipt text-slate-300 text-2xl"></i>
                </div>
                <p class="text-[11px] font-black text-slate-400 uppercase italic tracking-widest">Zero Transactions</p>
                <p class="text-[9px] text-slate-400 mt-1">Belum ada data transaksi untuk hari ini</p>
            </div>
        @endforelse
    </div>
    
    @if(count($todayTransactions ?? []) > 0)
        <div class="bg-[#0F172A] rounded-[2rem] p-5 shadow-xl shadow-slate-200 mt-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-warna-500/10 rounded-full blur-2xl"></div>
            
            <div class="flex justify-between items-center relative z-10">
                <div>
                    <p class="text-[10px] font-black text-warna-500 uppercase italic tracking-[0.2em] mb-1">Total Revenue</p>
                    <p class="text-white text-xs font-medium opacity-60">Hari ini, {{ date('d M Y') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-black text-white italic tracking-tighter leading-none">
                        <span class="text-sm text-warna-500">Rp</span>{{ number_format($totalToday ?? 0, 0, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
            </div>

        </div>
    </div>

    <!-- Modal Konfirmasi Delete -->
    @if($showDeleteModal)
    <div class="fixed z-50 inset-0 flex items-center justify-center bg-warna-300/50">
        <div class="relative bg-white rounded-lg shadow-lg p-6 mx-7 md:mx-0 w-full max-w-md">
            <div class="text-center"
                 x-data="{ show: false }"
                 x-init="setTimeout(() => show = true, 50)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95">
                
                <!-- Icon -->
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <i class="fas fa-trash-alt text-red-600 text-xl"></i>
                </div>
                
                <!-- Title -->
                <h3 class="text-lg font-medium text-gray-900 mb-2">
                    Hapus Transaksi
                </h3>
                
                <!-- Description -->
                <p class="text-sm text-gray-500 mb-6">
                    Apakah Anda yakin ingin menghapus transaksi ini? Tindakan ini tidak dapat dibatalkan.
                </p>
                
                <!-- Buttons -->
                <div class="flex space-x-3">
                    <button 
                        wire:click="cancelDelete"
                        class="flex-1 px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                        Batal
                    </button>
                    <button 
                        wire:click="deleteTransaction"
                        class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
