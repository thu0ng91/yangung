<div id="banner" class="updated-banner">
          <div class="wp">
            <ul class="content">
              <li class="ord-1">
                <div class="name">Beta版不断
<br />迭代更新                </div>
                <div class="time">2014-06至08</div>
                <div class="fold"></div>
              </li>
              <li class="ord-2">
                <div class="name">V1.0.0.0
<br />发布                </div>
                <div class="time">2014-08</div>
                <div class="fold"></div>
              </li>
              <li class="ord-3">
                <div class="name">未来等你
<br />一起完善                </div>
                <div class="time">201*</div>
                <div class="fold"></div>
              </li>
            </ul>
          </div>
          <div class="ripple"></div>
        </div>
      </div>
      <!-- /header -->
      <div id="main" class="wp clearfix">
        <div class="updated-list clearfix">
          <div class="col-1">
          <?php foreach ($datalog1 as $v):?>
                      <div class="item">
              <div class="shadow">
                <div class="subViewItem">
                  <div class="entity-detail">
                    <h3><span class="version"><?php echo $v->version_number;?></span><span class="time"><?php echo date('Y-m-d H:i:s',$v->posttime);?></span></h3>
                    <div class="content"><?php echo $v->updatelog;?></div>
                  </div>
                  <div class="direction"></div>
                  <div class="round"></div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
                      </div>
          <div class="col-2">
                        <?php foreach ($datalog2 as $v):?>
                      <div class="item">
              <div class="shadow">
                <div class="subViewItem">
                  <div class="entity-detail">
                    <h3><span class="version"><?php echo $v->version_number;?></span><span class="time"><?php echo date('Y-m-d H:i:s',$v->posttime);?></span></h3>
                    <div class="content"><?php echo $v->updatelog;?></div>
                  </div>
                  <div class="direction"></div>
                  <div class="round"></div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
                      </div>
          <div class="line-y"></div>
        </div>
        <div id="scriptArea" data-page-id="updated-page"></div>
      </div>
      <!-- /main -->