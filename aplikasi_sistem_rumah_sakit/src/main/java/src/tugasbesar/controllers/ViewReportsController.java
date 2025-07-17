package src.tugasbesar.controllers;

import javafx.collections.FXCollections;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;
import src.tugasbesar.models.Reports;

import java.io.IOException;

public class ViewReportsController {

    @FXML
    private TableView<Reports> doctorStatisticsTable;

    @FXML
    private TableColumn<Reports, String> specializationColumn;

    @FXML
    private TableColumn<Reports, String> doctorColumn;

    @FXML
    private TableView<Reports> medicineStatisticsTable;

    @FXML
    private TableColumn<Reports, String> medicineNameColumn;

    @FXML
    private TableColumn<Reports, String> priceColumn;

    @FXML
    private TableColumn<Reports, Integer> quantitySoldColumn;

    @FXML
    private TableView<Reports> roomStatisticsTable;

    @FXML
    private TableColumn<Reports, String> roomTypeColumn;

    @FXML
    private TableColumn<Reports, Integer> reservationsColumn;

    @FXML
    public void initialize() {
        // Setup kolom untuk tabel Dokter
        specializationColumn.setCellValueFactory(new PropertyValueFactory<>("detail1"));
        doctorColumn.setCellValueFactory(new PropertyValueFactory<>("detail2"));

        doctorStatisticsTable.setItems(FXCollections.observableArrayList(
                new Reports("Dokter", "Ilmu Kedokteran Jiwa", "Dr. A, Dr. B", 0),
                new Reports("Dokter", "Ilmu Bedah", "Dr. C, Dr. D", 0),
                new Reports("Dokter", "Ilmu Kesehatan Anak", "Dr. G, Dr. H", 0),
                new Reports("Dokter", "Ilmu Kesehatan Mata", "Dr. I, Dr. J", 0)
        ));

        // Setup kolom untuk tabel Obat
        medicineNameColumn.setCellValueFactory(new PropertyValueFactory<>("detail1"));
        priceColumn.setCellValueFactory(new PropertyValueFactory<>("detail2"));
        quantitySoldColumn.setCellValueFactory(new PropertyValueFactory<>("numericDetail"));

        medicineStatisticsTable.setItems(FXCollections.observableArrayList(
                new Reports("Obat", "Paracetamol", "Rp 5000", 150),
                new Reports("Obat", "Amoxicillin", "Rp 8000", 100),
                new Reports("Obat", "Ibuprofen", "Rp 7000", 120)
        ));

        // Setup kolom untuk tabel Kamar
        roomTypeColumn.setCellValueFactory(new PropertyValueFactory<>("detail1"));
        reservationsColumn.setCellValueFactory(new PropertyValueFactory<>("numericDetail"));

        roomStatisticsTable.setItems(FXCollections.observableArrayList(
                new Reports("Kamar", "Kamar VIP", "", 20),
                new Reports("Kamar", "Kamar Kelas 1", "", 30),
                new Reports("Kamar", "Kamar Kelas 2", "", 50),
                new Reports("Kamar", "Kamar Kelas 3", "", 40)
        ));
    }

    @FXML
    private void handleBackToDashboard(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/src/tugasbesar/dashboard.fxml"));
            Parent dashboardRoot = loader.load();

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();
            stage.setScene(new Scene(dashboardRoot));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
