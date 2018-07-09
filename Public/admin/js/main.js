var url = 'http://www.baiyi.xyz';
//栏目切换
var ashome = {
    left_change: function () {
        $('.leftnav h2').click(function () {
            $('.leftnav ul').hide(500);
            var num = $('.leftnav h2').index(this);
            $('.leftnav ul:eq(' + num + ')').show(500);
        })
    }
}
//删除
function  del(id,type){
    if(confirm("确定要删除？") ){
        window.location.href = url+'/Baiyi/'+type+'/del?id='+id;
    }
}
//图集页面
var asaddimg = {
    del : function(){
        $('.imgcontent li').mousemove(function(){
            $(this).children('.delimg').show();
        })

        $('.imgcontent li').mouseleave(function(){
            $(this).children('.delimg').hide();
        })

        $('.delimg').click(function(){
            if(confirm('确定要删除吗？')){
                $(this).parents('li').remove();
            }
        })
    }
}
//管理员信息获取
var amuser = {
    get_user_info:function () {
        $('.border-main').click(function(){
            var id=$(this).attr('data');
            $.post(url+'/Baiyi/User/getuser',{id:id},function(r){
                var r = eval('('+r+')');
                if(r!=0){
                    $('input[name="id"]').val(r['id']);
                    $('input[name="name"]').val(r['name']);
                    $('input[name="tell"]').val(r['tell']);
                    $('input[name="qq"]').val(r['qq']);
                    $('input[name="wx"]').val(r['wx']);
                    $('input[name="remark"]').val(r['remark']);
                }
            });
        });
    }
}
var amcolum={
	get_columinfo:function(){
    	$('.border-main').click(function(){
        	var id=$(this).attr('data');
            $.post(url+'/Baiyi/Baiyi/getcolum',{id:id},function(r){
              	console.log(r);
            	var r = eval('('+r+')');
              	if(r!=0){
                	$('input[name="id"]').val(r['id']);
                    $('input[name="name"]').val(r['name']);
                    $('input[name="sort"]').val(r['sort']);
                    $('input[name="keywords"]').val(r['keywords']);
                    $('input[name="description"]').val(r['description']);
                	$('.active').removeClass('active');
                    $('input[name="display"]:eq('+(r['display'])+')').parents('label').addClass('active');
                    $('input[name="display"]:eq('+(r['display'])+')').prop('checked',true);
                }
            });
        });
    }
}

