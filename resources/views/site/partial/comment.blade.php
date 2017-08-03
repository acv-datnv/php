
@for ($i=0;$i<count($findPost->comment);$i++)
    <li>
        <div class="commenterImage">
            <img src="http://placekitten.com/45/45" />
        </div>
        <div class="commentText">
            <p><b>{{$findPost->comment[$i]->user->name}}</b></p>
            <p class="">{{$findPost->comment[$i]->content}}</p>
            <span class="date sub-text">{{$findPost->comment[$i]->updated_at}}</span>
        </div>
    </li>
@endfor
