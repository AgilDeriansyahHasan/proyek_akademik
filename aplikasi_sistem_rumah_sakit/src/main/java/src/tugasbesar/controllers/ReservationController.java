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
import src.tugasbesar.models.Reservasi;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class ReservationController {

    @FXML
    private TextField reservationIdField;
    @FXML
    private TextField patientNameField;
    @FXML
    private TextField doctorNameField;
    @FXML
    private TextField dateField;
    @FXML
    private TextField timeField;
    @FXML
    private TextField statusField;

    @FXML
    private ComboBox<String> roomTypeComboBox;
    @FXML
    private Label facilitiesLabel;

    @FXML
    private TableView<Reservasi> reservationTable;
    @FXML
    private TableColumn<Reservasi, String> reservationIdColumn;
    @FXML
    private TableColumn<Reservasi, String> patientNameColumn;
    @FXML
    private TableColumn<Reservasi, String> doctorNameColumn;
    @FXML
    private TableColumn<Reservasi, String> dateColumn;
    @FXML
    private TableColumn<Reservasi, String> timeColumn;
    @FXML
    private TableColumn<Reservasi, String> statusColumn;
    @FXML
    private TableColumn<Reservasi, String> roomTypeColumn;
    @FXML
    private TableColumn<Reservasi, String> facilitiesColumn;

    private ObservableList<Reservasi> reservasiList = FXCollections.observableArrayList();

    @FXML
    public void initialize() {
        // Initialize table columns
        reservationIdColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getIdReservasi()));
        patientNameColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getNamaPasien()));
        doctorNameColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getNamaDokter()));
        dateColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getTanggal()));
        timeColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getWaktu()));
        statusColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getStatus()));
        roomTypeColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getRoomType()));
        facilitiesColumn.setCellValueFactory(cellData -> new javafx.beans.property.SimpleStringProperty(cellData.getValue().getFacilities()));

        // Bind the data to the table
        reservationTable.setItems(reservasiList);

        // Initialize ComboBox for room types
        roomTypeComboBox.setItems(FXCollections.observableArrayList("Kamar VIP", "Kamar Kelas 1", "Kamar Kelas 2", "Kamar Kelas 3"));
        roomTypeComboBox.setOnAction(event -> updateFacilities());
    }

    private void updateFacilities() {
        String selectedRoomType = roomTypeComboBox.getValue();
        Map<String, String> roomFacilities = new HashMap<>();
        roomFacilities.put("Kamar VIP", "AC, TV, Kulkas, Layanan 24 Jam");
        roomFacilities.put("Kamar Kelas 1", "AC, TV, Kulkas");
        roomFacilities.put("Kamar Kelas 2", "AC, TV");
        roomFacilities.put("Kamar Kelas 3", "TV");

        // Menampilkan fasilitas yang sesuai dengan tipe kamar yang dipilih
        if (selectedRoomType != null) {
            facilitiesLabel.setText("Fasilitas: " + roomFacilities.get(selectedRoomType));
        } else {
            facilitiesLabel.setText("Fasilitas: -");
        }
    }

    @FXML
    public void handleSubmit() {
        // Retrieve input data
        String idReservasi = reservationIdField.getText();
        String namaPasien = patientNameField.getText();
        String namaDokter = doctorNameField.getText();
        String tanggal = dateField.getText();
        String waktu = timeField.getText();
        String status = statusField.getText();
        String roomType = roomTypeComboBox.getValue();
        String facilities = facilitiesLabel.getText().replace("Fasilitas: ", "");

        // Validate input
        if (idReservasi.isEmpty() || namaPasien.isEmpty() || namaDokter.isEmpty() || tanggal.isEmpty() || waktu.isEmpty() || status.isEmpty() || roomType == null) {
            showAlert("Error", "Semua kolom harus diisi, termasuk tipe kamar!", Alert.AlertType.ERROR);
            return;
        }

        // Create a new Reservasi object and add it to the list
        Reservasi reservasi = new Reservasi(idReservasi, namaPasien, namaDokter, tanggal, waktu, status, roomType, facilities);
        reservasiList.add(reservasi);

        // Clear input fields
        clearForm();
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

    private void clearForm() {
        reservationIdField.clear();
        patientNameField.clear();
        doctorNameField.clear();
        dateField.clear();
        timeField.clear();
        statusField.clear();
        roomTypeComboBox.getSelectionModel().clearSelection();
        facilitiesLabel.setText("Fasilitas: -");
    }

    private void showAlert(String title, String message, Alert.AlertType alertType) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
