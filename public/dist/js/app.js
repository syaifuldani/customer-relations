$(function () {
    const current = location.pathname;
    $("nav a").each(function () {
        var $this = $(this);
        if ($this.attr("href").indexOf(current) !== -1) {
            $this.addClass("active");
        }
    });
});
