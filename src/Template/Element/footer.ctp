<!-- START FOOTER -->
<footer id="footer">
    <strong style="float: left;padding-left: 25px">Copyright © <?= date('Y') ?> <a href="#" style="color: #ec407a;">Graphic Zoo</a></strong>
     
</footer>

<!--<footer id="footer">    
    <div class="row">
        <div class="col-sm-6" style="text-align: left; padding-left: 34px">
            <strong>Copyright © <?= date('Y') ?> <a href="#" style="color: #ec407a;"></a></strong>
        </div>
        <div class="col-sm-6 text-right" style="text-align: right; padding-right: 34px">
            <strong>Developed By <a href="" target="_blank" style="color: #ec407a;"></a></strong>
        </div>
    </div>
</footer>-->
<!-- END FOOTER -->

<!-- Start of Async Drift Code -->
<script>
    !function () {
        var t;
        if (t = window.driftt = window.drift = window.driftt || [], !t.init)
            return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0,
                    t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
                    t.factory = function (e) {
                        return function () {
                            var n;
                            return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
                        };
                    }, t.methods.forEach(function (e) {
                t[e] = t.factory(e);
            }), t.load = function (t) {
                var e, n, o, i;
                e = 3e5, i = Math.ceil(new Date() / e) * e, o = document.createElement("script"),
                        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + i + "/" + t + ".js",
                        n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
            });
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('d6yi38hkhwsd');
</script>