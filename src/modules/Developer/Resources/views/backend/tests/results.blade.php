@if(count($results) > 0)
    @foreach($results as $k => $result)
        @if($result->event === 'test')
            <div class="alert alert-{{ ($result->status === 'fail') ? 'danger' : 'success' }}" role="alert">
                <strong>{{ str_replace('_',' ', preg_replace('/(?<!\ )[A-Z]/', ' $0', str_replace($result->suite.'::test', '', $result->test))) }}</strong>
                @if($result->status === 'fail')
                    <a class="show-test-message btn btn-primary pull-right">Show message</a>
                    <div class="row test-message" style="display:none;">
                        {{ $result->message }}
                    </div>
                    <div class="clearfix"></div>
                @endif
            </div>
        @endif
    @endforeach
@endif