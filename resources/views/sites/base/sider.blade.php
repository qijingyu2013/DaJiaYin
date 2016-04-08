<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul class="list-unstyled">
            @if(!is_null($siderSonObj))
                @foreach ($siderSonObj as $sider)
                    <li class="has-children {{ $sider->kword }}">
                        {{ Html::link('/'.$sider->kword.'/'.$sider->kword, $sider->title) }}
                        <ul class="list-unstyled">
                            @if(!is_null($sider->hasManySiders))
                                @foreach ($sider->hasManySiders as $sider_son)
                                    <li>{{ Html::link('/admina/'.$sider->kword.'/'.$sider_son->kword, $sider_son->title) }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
    </nav>
</main>