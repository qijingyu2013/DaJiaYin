<div class="col-md-2">
    <nav class="cd-side-nav">
        <ul class="list-unstyled">
            @if(!is_null($siderLeft))
                @foreach ($siderLeft as $sider)
                    @if($sider->kword == $type && $type == 'about' && !is_null($sider->hasManySiders) && count($sider->hasManySiders)>0)
                        @foreach ($sider->hasManySiders as $sider_son)
                            <li>{{ Html::link('/'.$sider->kword.'/'.$sider_son->kword, $sider_son->title) }}</li>
                        @endforeach
                    @elseif($sider->kword == 'product' && $type == 'product')
                        @foreach ($sider->hasManySiders as $sider_son)
                            @if($sider_son->kword == $productType)
                                @foreach ($sider_son->hasManySiders as $sider_son_pre)
                                    <li>{{ Html::link('/'.$sider->kword.'/'.$sider_son_pre->kword, $sider_son_pre->title) }}</li>
                                @endforeach
                            @endif
                        @endforeach
                    @elseif($sider->kword == 'asterisk' && $type == 'asterisk' && !is_null($sider->hasManySiders) && count($sider->hasManySiders)>0)

                        @foreach ($sider->hasManySiders as $sider_son)
                            <li>{{ Html::link('/'.$sider->kword.'/'.$sider_son->kword, $sider_son->title) }}</li>
                        @endforeach

                    @endif

                @endforeach
            @endif
        </ul>
    </nav>
</div>