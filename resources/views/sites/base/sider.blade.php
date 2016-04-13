<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul class="list-unstyled">
            @if(!is_null($siderLeft))
                @foreach ($siderLeft as $sider)
                    @if($sider->kword == 'about' && !is_null($sider->hasManySiders) && count($sider->hasManySiders)>0)
                        @foreach ($sider->hasManySiders as $sider_son)
                            <li>{{ Html::link('/'.$sider->kword.'/'.$sider_son->kword, $sider_son->title) }}</li>
                        @endforeach
                    @endif
                @endforeach
            @endif
        </ul>
    </nav>
</main>