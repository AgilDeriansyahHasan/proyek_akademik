package src.tugasbesar.controllers;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import src.tugasbesar.models.Patient;

import java.io.IOException;

public class ManagePatientController {

    @FXML
    private TextField idField, nameField, ageField, phoneField;

    @FXML
    private ComboBox<String> genderField, specialistField, doctorField;

    @FXML
    private TableView<Patient> patientTable;

    @FXML
    private TableColumn<Patient, String> idColumn, nameColumn, ageColumn, genderColumn, phoneColumn, specialistColumn, doctorColumn;

    private final ObservableList<Patient> patientData = FXCollections.observableArrayList();

    private final ObservableList<String> genderOptions = FXCollections.observableArrayList("Laki-Laki", "Perempuan");
    private final ObservableList<String> specialists = FXCollections.observableArrayList("Ilmu Kedokteran Jiwa", "Ilmu Bedah", "Ilmu Kesehatan Anak", "Ilmu Kesehatan Mata");

    private final ObservableList<String> kedokteranJiwaDoctors = FXCollections.observableArrayList("Dr. A", "Dr. B");
    private final ObservableList<String> bedahDoctors = FXCollections.observableArrayList("Dr. C", "Dr. D");
    private final ObservableList<String> kesehatanAnakDoctors = FXCollections.observableArrayList("Dr. G", "Dr. H");
    private final ObservableList<String> kesehatanMataDoctors = FXCollections.observableArrayList("Dr. I", "Dr. J");

    @FXML
    public void initialize() {
        // Inisialisasi pilihan jenis kelamin
        genderField.setItems(genderOptions);

        // Inisialisasi daftar spesialis di ComboBox
        specialistField.setItems(specialists);

        // Hubungkan kolom tabel dengan properti model
        idColumn.setCellValueFactory(cellData -> cellData.getValue().idProperty());
        nameColumn.setCellValueFactory(cellData -> cellData.getValue().nameProperty());
        ageColumn.setCellValueFactory(cellData -> cellData.getValue().ageProperty());
        genderColumn.setCellValueFactory(cellData -> cellData.getValue().genderProperty());
        phoneColumn.setCellValueFactory(cellData -> cellData.getValue().phoneProperty());
        specialistColumn.setCellValueFactory(cellData -> cellData.getValue().specialistProperty());
        doctorColumn.setCellValueFactory(cellData -> cellData.getValue().doctorProperty());

        // Hubungkan data ke tabel
        patientTable.setItems(patientData);
    }

    @FXML
    private void onSpecialistSelected(ActionEvent event) {
        // Kosongkan daftar dokter sebelumnya
        doctorField.getItems().clear();

        // Ambil spesialis yang dipilih
        String selectedSpecialist = specialistField.getSelectionModel().getSelectedItem();
        if (selectedSpecialist == null) {
            return;
        }

        // Isi daftar dokter berdasarkan spesialis yang dipilih
        switch (selectedSpecialist) {
            case "Ilmu Kedokteran Jiwa":
                doctorField.setItems(kedokteranJiwaDoctors);
                break;
            case "Ilmu Bedah":
                doctorField.setItems(bedahDoctors);
                break;
            case "Ilmu Kesehatan Anak":
                doctorField.setItems(kesehatanAnakDoctors);
                break;
            case "Ilmu Kesehatan Mata":
                doctorField.setItems(kesehatanMataDoctors);
                break;
            default:
                break;
        }
    }

    @FXML
    private void handleSubmit(ActionEvent event) {
        // Ambil data dari form
        String id = idField.getText();
        String name = nameField.getText();
        String age = ageField.getText();
        String gender = genderField.getSelectionModel().getSelectedItem();
        String phone = phoneField.getText();
        String specialist = specialistField.getSelectionModel().getSelectedItem();
        String doctor = doctorField.getSelectionModel().getSelectedItem();

        // Validasi sederhana
        if (id.isEmpty() || name.isEmpty() || age.isEmpty() || gender == null || phone.isEmpty() || specialist == null || doctor == null) {
            Alert alert = new Alert(Alert.AlertType.WARNING, "Semua field harus diisi, termasuk spesialis dan dokter!", ButtonType.OK);
            alert.showAndWait();
            return;
        }

        // Tambahkan data ke tabel
        patientData.add(new Patient(id, name, age, gender, phone, specialist, doctor));

        // Kosongkan form
        idField.clear();
        nameField.clear();
        ageField.clear();
        genderField.getSelectionModel().clearSelection();
        phoneField.clear();
        specialistField.getSelectionModel().clearSelection();
        doctorField.getItems().clear();
    }

    @FXML
    private void handleBackToDashboard(ActionEvent event) {
        try {
            // Muat file FXML untuk halaman dashboard
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/src/tugasbesar/dashboard.fxml"));
            Parent dashboardRoot = loader.load();

            // Ambil stage dari tombol yang ditekan
            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            // Ganti scene dengan dashboard
            stage.setScene(new Scene(dashboardRoot));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
