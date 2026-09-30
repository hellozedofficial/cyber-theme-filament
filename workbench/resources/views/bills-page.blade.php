<x-filament-panels::page>
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <!-- Feature Highlights Liquid Card -->
        <div class="fi-section" style="padding: 1.5rem; border-radius: 1.5rem;">
            <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
                <div>
                    <h2 style="font-size: 1.25rem; font-weight: 700; letter-spacing: -0.02em; margin: 0;">
                        Revolut Business Liquid Glass Showcase
                    </h2>
                    <p style="margin: 0.25rem 0 0 0; font-size: 0.875rem; opacity: 0.75;">
                        True optical liquid refraction with chromatic dispersion. Hover over cards and buttons to feel the liquid spring physics.
                    </p>
                </div>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="display: inline-flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; font-weight: 600; color: #10b981;">
                        Liquid Glass Active
                    </span>
                </div>
            </div>
        </div>

        <!-- Sample Bills List (Revolut Business style) -->
        <div class="fi-section" style="padding: 1.5rem; border-radius: 1.5rem;">
            <div style="display: grid; grid-template-columns: 2fr 1.5fr 1fr 1fr; padding-bottom: 0.75rem; border-bottom: 1px solid rgba(255, 255, 255, 0.08); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; opacity: 0.6;">
                <div>Transaction</div>
                <div>Creation Date</div>
                <div>Status</div>
                <div style="text-align: right;">Amount</div>
            </div>

            @php
                $sampleBills = [
                    ['name' => 'Mobbin Pte. Ltd.', 'initials' => 'MP', 'date' => 'Moments ago', 'status' => 'Due on Nov 25, 2026', 'status_bg' => 'rgba(245, 158, 11, 0.15)', 'status_color' => '#f59e0b', 'amount' => '$5.00'],
                    ['name' => 'Cloudflare Infrastructure', 'initials' => 'CF', 'date' => 'Nov 19, 4:34 PM', 'status' => 'Paid', 'status_bg' => 'rgba(16, 185, 129, 0.15)', 'status_color' => '#10b981', 'amount' => 'S$ 140.00'],
                    ['name' => 'GitHub Enterprise', 'initials' => 'GH', 'date' => 'Nov 18, 11:20 AM', 'status' => 'Paid', 'status_bg' => 'rgba(16, 185, 129, 0.15)', 'status_color' => '#10b981', 'amount' => '$42.00'],
                    ['name' => 'AWS Cloud Services', 'initials' => 'AW', 'date' => 'Nov 15, 09:12 AM', 'status' => 'Paid', 'status_bg' => 'rgba(16, 185, 129, 0.15)', 'status_color' => '#10b981', 'amount' => '$328.50'],
                    ['name' => 'Figma Professional Team', 'initials' => 'FG', 'date' => 'Nov 14, 02:45 PM', 'status' => 'Paid', 'status_bg' => 'rgba(16, 185, 129, 0.15)', 'status_color' => '#10b981', 'amount' => '$75.00'],
                    ['name' => 'Vercel Pro Tier', 'initials' => 'VC', 'date' => 'Nov 10, 08:30 AM', 'status' => 'Paid', 'status_bg' => 'rgba(16, 185, 129, 0.15)', 'status_color' => '#10b981', 'amount' => '$20.00'],
                ];
            @endphp

            <div style="display: flex; flex-direction: column; gap: 0.25rem; margin-top: 0.5rem;">
                @foreach($sampleBills as $bill)
                    <div class="fi-bills-row" style="display: grid; grid-template-columns: 2fr 1.5fr 1fr 1fr; align-items: center; padding: 0.85rem 0.5rem; border-radius: 0.75rem; transition: background 0.2s ease;">
                        <!-- Transaction Avatar & Name -->
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 2.25rem; height: 2.25rem; border-radius: 9999px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.75rem; background: linear-gradient(135deg, #3b82f6, #6366f1); color: #fff; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4);">
                                {{ $bill['initials'] }}
                            </div>
                            <div>
                                <div style="font-weight: 600; font-size: 0.875rem;">
                                    {{ $bill['name'] }}
                                </div>
                                <div style="font-size: 0.75rem; opacity: 0.55;">
                                    Bank transfer
                                </div>
                            </div>
                        </div>

                        <!-- Date -->
                        <div style="font-size: 0.875rem; opacity: 0.75;">
                            {{ $bill['date'] }}
                        </div>

                        <!-- Status Badge -->
                        <div>
                            <span style="display: inline-block; padding: 0.25rem 0.65rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: {{ $bill['status_bg'] }}; color: {{ $bill['status_color'] }};">
                                {{ $bill['status'] }}
                            </span>
                        </div>

                        <!-- Amount -->
                        <div style="text-align: right; font-weight: 700; font-size: 0.95rem;">
                            {{ $bill['amount'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-filament-panels::page>
