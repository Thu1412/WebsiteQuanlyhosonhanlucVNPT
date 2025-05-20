
document.addEventListener("DOMContentLoaded", function () {
    let universitiesData = {};  // Dữ liệu sẽ lưu ở đây

    // Load dữ liệu từ file JSON
    fetch("/universities_data.json")
        .then(response => response.json())
        .then(data => {
            universitiesData = data;
            loadUniversities();
        })
        .catch(error => console.error("Lỗi khi tải dữ liệu:", error));

    function loadUniversities() {
        const BasisTrainSelect = document.getElementById("BasisTrainSelect");
        for (let BasisTrain in universitiesData) {
            let option = new Option(BasisTrain, BasisTrain);
            BasisTrainSelect.appendChild(option);
        }
    }

    document.getElementById("BasisTrainSelect").addEventListener("change", function () {
        const selectedBasisTrain = this.value;
        const StandardTrainSelect = document.getElementById("StandardTrainSelect");
        const FormTrainSelect = document.getElementById("FormTrainSelect");

        // Xóa dữ liệu cũ
        StandardTrainSelect.innerHTML = '<option value="">Chọn chương trình đào tạo</option>';
        FormTrainSelect.innerHTML = '<option value="">Chọn ngành đào tạo</option>';
        FormTrainSelect.disabled = true;

        if (selectedBasisTrain && universitiesData[selectedBasisTrain]?.StandardTrains) {
            const StandardTrains = Object.keys(universitiesData[selectedBasisTrain].StandardTrains);
            StandardTrains.forEach(StandardTrain => {
                let option = new Option(StandardTrain, StandardTrain);
                StandardTrainSelect.appendChild(option);
            });
            StandardTrainSelect.disabled = false;
        } else {
            StandardTrainSelect.disabled = true;
        }
    });

    document.getElementById("StandardTrainSelect").addEventListener("change", function () {
        const selectedBasisTrain = document.getElementById("BasisTrainSelect").value;
        const selectedStandardTrain = this.value;
        const FormTrainSelect = document.getElementById("FormTrainSelect");

        // Xóa dữ liệu cũ
        FormTrainSelect.innerHTML = '<option value="">Chọn ngành đào tạo</option>';

        if (selectedStandardTrain && universitiesData[selectedBasisTrain]?.StandardTrains[selectedStandardTrain]) {
            const FormTrains = universitiesData[selectedBasisTrain].StandardTrains[selectedStandardTrain];
            FormTrains.forEach(FormTrain => {
                let option = new Option(FormTrain, FormTrain);
                FormTrainSelect.appendChild(option);
            });
            FormTrainSelect.disabled = false;
        } else {
            FormTrainSelect.disabled = true;
        }
    });
});