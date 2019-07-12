@extends('../../sidebars.admin')

@section('title', 'Dashboard')

@section('rightbar')

<!-- /. NAV SIDE  -->
<div id="page-wrapper">

    <div id="page-inner">
       <div class="card-body pull-right">
          <a href="/member" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-left"></i></a>
        </div>
        <div class="row">
         <br>
                <br>
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-secondary">
                                <div class="panel-heading">
                                   Previous chat
                                </div>
                                <div class="panel-body" style="padding: 0px;">
                                    <div class="chat-widget-main">
                                        <div class="chat-widget-left">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                        <div class="chat-widget-name-left">
                                            <h4>Amanna Seiar</h4>
                                        </div>
                                        <div class="chat-widget-right">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                        <div class="chat-widget-name-right">
                                            <h4>Donim Cruseia </h4>
                                        </div>
                                        <div class="chat-widget-left">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                        <div class="chat-widget-name-left">
                                            <h4>Amanna Seiar</h4>
                                        </div>
                                        <div class="chat-widget-right">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                        <div class="chat-widget-name-right">
                                            <h4>Donim Cruseia </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter Message" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button">SEND</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <div class="panel panel-secondary">
                                <div class="panel-heading">
                                    <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Send Message
                                </div>

                                <div class="panel-body">
                                    <div class="list-group">
                                        <div class="form-group">
                                            <label for="name">
                                                Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label for="name">
                                                Message</label>
                                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                                placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      
        </div>
    </div>
</div>

@endsection