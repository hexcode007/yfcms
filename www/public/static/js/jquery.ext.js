;(function($) {
    $.fn.extend({
        formCheck: function(_config) {
            var config = {
                showType: "error",
                callback: "",
            };
            _config && $.extend(config, _config);
            var _requires = $(this).find("[notnull=true]");
            var _flag = true;
            $.clearError();
            _requires.clearError();
            _requires.each(function() {
                _require = $(this);
                _notice = _require.attr("info");
                _tagName = _require[0].tagName.toLowerCase();
                if (!_notice) {
                    _flag = false;
                    return true;
                }
                if (_tagName == "input" || _tagName == "select" || _tagName == "textarea") {
                    if(_require.val() == "" || (_tagName == "select" && _require.val() == 0)) {
                        _require.error();
                        $.isFunction($[config.showType]) ? $[config.showType](_notice + "不能为空!") : ($.isFunction(config.showType) && config.showType(_notice + "不能为空!"));
                        //$.isFunction($[config.totop]) ? $[config.totop]() : ($.isFunction(config.totop) && config.totop());
                        _flag = false;
                        return false;
                    }else if (_require.attr("rule")) {
                        _rule = eval(_require.attr("rule"));
                        if (_rule.test(_require.val()) == false) {
                            _require.error();
                            $.isFunction($[config.showType]) ? $[config.showType](_notice + "不符合规则!") : ($.isFunction(config.showType) && config.showType(_notice + "不符合规则!"));
                            //$.isFunction($[config.totop]) ? $[config.totop]() : ($.isFunction(config.totop) && config.totop());
                            _flag = false;
                            return false;
                        }
                    }else {
                        $.clearError();
                    }
                }
            });
            if (_flag == false) {
                return false;
            }
            _flag && config.callback && $.isFunction(config.callback) && config.callback();
            return _flag;
        },
        error: function() {
            $(this).addClass("error");
        },
        clearError: function() {
            $(this).removeClass("error");
        },
        ajaxSubmit: function(_option) {
            option = {
                //data:$(this).serialize().toQueryParams(),
                data: $(this).serialize(),
                url: $(this).attr("action") || "",
                title: $(this).attr("form_tittle") || "",
                type: $(this).attr("method") || "get",
                callback: '',
                isCheck: true, //是否执行表单检查
                formCheck: {
                    showType: 'error',
                    callback: ''
                }
            };
            _option && $.extend(option, _option);
            if (option.isCheck) {
                option.formCheck.callback = function() {
                    $.request(option);
                }
                $(this).formCheck(option.formCheck);
            } else {
                delete option.isCheck;
                delete option.formCheck;
                $.request(option);
            }
            return true;
        }
    });
    $.extend({
        error: function(msg) {
            alert(msg);
            return false;
        },
        clearError: function(msg) {
            return true;
        },
        success: function() {
            return true;
        },
        info: function(msg) {
            return true;
        },
        request: function(_option) {
            option = {
                data: null,
                url: "",
                title: "",
                async: true,
                type: "get",
                callback: '',
            }
            _option && $.extend(option, _option);
            option.data && (option.data = "_t=" + $.time() + "&" + option.data);
            ajax_option = {
                error: function() {
                    $.error("系统超时( timeout ),请稍后再试!");
                },
                success: function(data) {
                    if (typeof data != "object") {
                        try {
                            data = $.parseJSON(data);
                            typeof data != "object" && (function() {
                                $.error("请检查系统错误（warnning）或者返回格式错误");
                                return false;
                            })();
                        } catch (e) {
                            typeof data != "object" && (function() {
                                $.error("请检查系统错误（warnning）或者返回格式错误");
                                return false;
                            })();
                        }
                    }
                    $.isFunction(option.callback) && option.callback(data);
                },
                timeout: 6000,
                dataType: "html",
            };
            $.extend(ajax_option, option);
            $.ajax(ajax_option);
        },
        time: function() {
            return Date.parse(new Date()) / 1000;
        }
    })
})(jQuery);