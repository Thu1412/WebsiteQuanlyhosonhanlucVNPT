document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function(event) {
        let startDate = new Date(document.querySelector("[name='DateStart']").value);
        let endDate = new Date(document.querySelector("[name='DateEnd']").value);

        if (isNaN(endDate) || endDate < startDate) {
            alert("Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu!");
            event.preventDefault();
        }
    });
});
