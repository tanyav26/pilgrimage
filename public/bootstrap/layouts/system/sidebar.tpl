
<div class="btn-toolbar no-top-margin">
    <div class="btn-group">
        <button class="btn">Add New ...</button>
        <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <a class="btn" href="/member/settings/account"><i class="icon icon-cog"></i>&nbsp;Edit Information</a>
    </div>
</div>



<!-- Dasboard Menu -->
<div style="margin-top:15px">
    <?php echo $this->navigation("dashboardmenu"); ?>
</div>


<div class="widget top-pad">
    <h4>Following</h4> 
    <div class="widget-body top-pad">

        <ul class="thumbnails">
            <?php for ($i = 0; $i < 15; $i++): ?>
            <li>
                <a href="#" class="thumbnail">
                    <img src="http://placehold.it/32x32" alt="" width="32" height="32" />
                </a>
            </li>
            <?php endfor; ?>
        </ul>
    </div>
    <small><a href="#">View all</a></small>
</div>

<hr />

<div class="widget">
    <h4>What to try next? </h4>
    <div class="widget-body top-pad">
        <form>
            <fieldset>

                <ol class="timeline-tips-list">
                    <li>
                        <div class="tip-title">Attend the <a href="#">pancake eating comp.</a></div>
                        <div class="tip-popularity pull-right">20%</div>
                        <div class="suggestion-info">Suggested by @drstonyhills</div>
                        <div class="progress mini-bar progress-danger progress-bar">
                            <div class="bar" style="width: 20%;"></div>
                        </div>
                        <div class="tip-actions"><a href="#" class="tip-response"><i class="icon-ok"></i></a> <a href="#" class="tip-response"><i class="icon-remove"></i></a></div>
                    </li>
                    <li>
                        <div class="tip-title">Try a discounted <a href="#">pint of Tuborg</a>.</div>  
                        <div class="tip-popularity pull-right">53%</div>
                        <div class="suggestion-info">Suggested by @drstonyhills</div>
                        <div class="progress mini-bar progress-success progress-bar">
                            <div class="bar" style="width: 53%;"></div>
                        </div>
                        <div class="tip-actions"><a href="#" class="tip-response"><i class="icon-ok"></i></a> <a href="#" class="tip-response"><i class="icon-remove"></i></a></div>
                    </li>
                    <li>
                        <div class="tip-title">Meet <a href="#">Rudolf Edinau</a>.</div>
                        <div class="tip-popularity pull-right">20%</div>
                        <div class="suggestion-info">Suggested by @drstonyhills</div>
                        <div class="progress mini-bar progress-danger progress-bar">
                            <div class="bar" style="width: 20%;"></div>
                        </div>
                        <div class="tip-actions"><a href="#" class="tip-response"><i class="icon-ok"></i></a> <a href="#" class="tip-response"><i class="icon-remove"></i></a></div>
                    </li>
                    <li>
                        <div class="tip-title">Play a <a href="#">game of darts</a>.</div>
                        <div class="tip-popularity pull-right">50%</div>
                        <div class="suggestion-info">Suggested by @drstonyhills</div>
                        <div class="progress mini-bar progress-bar">
                            <div class="bar" style="width: 50%;"></div>
                        </div>
                        <div class="tip-actions"><a href="#" class="tip-response"><i class="icon-ok"></i></a> <a href="#" class="tip-response"><i class="icon-remove"></i></a></div>
                    </li>
                    <li>
                        <div class="tip-title">Play a <a href="#">game of backgamon</a>.</div>
                        <div class="tip-popularity pull-right">43%</div>
                        <div class="suggestion-info">Suggested by @drstonyhills</div>
                        <div class="progress mini-bar progress-danger progress-bar">
                            <div class="bar" style="width: 43%;"></div>
                        </div>
                        <div class="tip-actions"><a href="#" class="tip-response"><i class="icon-ok"></i></a> <a href="#" class="tip-response"><i class="icon-remove"></i></a></div>
                    </li>
                </ol>
            </fieldset>
        </form>
    </div>
</div>

<hr />
