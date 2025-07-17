// src/tugasbesar/controllers/MedicineOrderController.java
package src.tugasbesar.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.TableCell;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import src.tugasbesar.models.Medicine;
import src.tugasbesar.models.MedicineOrder;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

public class MedicineOrderController {

    // Constants for messages
    private static final String ERROR_TITLE = "Error";
    private static final String SUCCESS_TITLE = "Sukses";
    private static final String EMPTY_CART_MESSAGE = "Keranjang kosong, tidak dapat melakukan pembayaran!";
    private static final String INVALID_QUANTITY_MESSAGE = "Jumlah harus lebih besar dari nol!";
    private static final String INVALID_NUMBER_MESSAGE = "Jumlah harus berupa angka!";
    private static final String EMPTY_QUANTITY_MESSAGE = "Masukkan jumlah obat yang ingin dibeli!";
    private static final String NO_MEDICINE_SELECTED = "Pilih obat terlebih dahulu!";
    private static final String PAYMENT_SUCCESS_MESSAGE = "Pembayaran berhasil!";
    private static final String DASHBOARD_ERROR_MESSAGE = "Tidak dapat kembali ke dashboard!";

    @FXML
    private TableView<Medicine> medicineTable;
    @FXML
    private TableColumn<Medicine, String> medicineNameColumn;
    @FXML
    private TableColumn<Medicine, Double> medicinePriceColumn;
    @FXML
    private TableColumn<Medicine, Void> medicineActionColumn;

    @FXML
    private TextField quantityField;

    @FXML
    private TableView<MedicineOrder> cartTable;
    @FXML
    private TableColumn<MedicineOrder, String> cartMedicineNameColumn;
    @FXML
    private TableColumn<MedicineOrder, Integer> cartQuantityColumn;
    @FXML
    private TableColumn<MedicineOrder, Double> cartPriceColumn;

    @FXML
    private Label totalPriceLabel;

    private List<Medicine> availableMedicines;
    private List<MedicineOrder> cart;

    @FXML
    public void initialize() {
        initializeData();
        setupMedicineTable();
        setupCartTable();
        updateTotalPrice();
    }

    // Initialize data
    private void initializeData() {
        availableMedicines = new ArrayList<>();
        cart = new ArrayList<>();
        availableMedicines.add(new Medicine("Paracetamol", 5000));
        availableMedicines.add(new Medicine("Amoxicillin", 8000));
        availableMedicines.add(new Medicine("Ibuprofen", 7000));
    }

    // Set up the medicine table
    private void setupMedicineTable() {
        medicineNameColumn.setCellValueFactory(new PropertyValueFactory<>("name"));
        medicinePriceColumn.setCellValueFactory(new PropertyValueFactory<>("price"));

        // Add an action button to each row
        medicineActionColumn.setCellFactory(param -> new TableCell<>() {
            private final Button addButton = new Button("Tambah");

            {
                addButton.setOnAction(event -> {
                    Medicine selectedMedicine = getTableView().getItems().get(getIndex());
                    handleAddToCart(selectedMedicine);
                });
            }

            @Override
            protected void updateItem(Void item, boolean empty) {
                super.updateItem(item, empty);
                setGraphic(empty ? null : addButton);
            }
        });

        medicineTable.getItems().setAll(availableMedicines);
    }

    // Set up the cart table
    private void setupCartTable() {
        cartMedicineNameColumn.setCellValueFactory(new PropertyValueFactory<>("name"));
        cartQuantityColumn.setCellValueFactory(new PropertyValueFactory<>("quantity"));
        cartPriceColumn.setCellValueFactory(new PropertyValueFactory<>("totalPrice"));
    }

    // Handle adding an item to the cart
    @FXML
    public void handleAddToCart(Medicine selectedMedicine) {
        if (selectedMedicine == null) {
            showAlert(ERROR_TITLE, NO_MEDICINE_SELECTED, Alert.AlertType.ERROR);
            return;
        }

        String quantityText = quantityField.getText();
        if (quantityText.isEmpty()) {
            showAlert(ERROR_TITLE, EMPTY_QUANTITY_MESSAGE, Alert.AlertType.ERROR);
            return;
        }

        try {
            int quantity = Integer.parseInt(quantityText);
            if (quantity <= 0) {
                showAlert(ERROR_TITLE, INVALID_QUANTITY_MESSAGE, Alert.AlertType.ERROR);
                return;
            }

            addOrderToCart(selectedMedicine, quantity);

        } catch (NumberFormatException e) {
            showAlert(ERROR_TITLE, INVALID_NUMBER_MESSAGE, Alert.AlertType.ERROR);
        }
    }

    // Add order to cart
    private void addOrderToCart(Medicine selectedMedicine, int quantity) {
        MedicineOrder order = new MedicineOrder(selectedMedicine.getName(), quantity, selectedMedicine.getPrice() * quantity);
        cart.add(order);
        refreshCartTable();
        updateTotalPrice();
    }

    // Refresh the cart table
    private void refreshCartTable() {
        cartTable.getItems().setAll(cart);
    }

    // Handle payment
    @FXML
    public void handlePayment(ActionEvent event) {
        if (cart.isEmpty()) {
            showAlert(ERROR_TITLE, EMPTY_CART_MESSAGE, Alert.AlertType.ERROR);
            return;
        }

        showAlert(SUCCESS_TITLE, PAYMENT_SUCCESS_MESSAGE, Alert.AlertType.INFORMATION);
        cart.clear();
        refreshCartTable();
        updateTotalPrice();
    }

    // Update the total price label
    private void updateTotalPrice() {
        double totalPrice = cart.stream().mapToDouble(MedicineOrder::getTotalPrice).sum();
        totalPriceLabel.setText(String.format("Total Harga: Rp %.2f", totalPrice));
    }

    // Show alert dialog
    private void showAlert(String title, String message, Alert.AlertType alertType) {
        Alert alert = new Alert(alertType);
        alert.setTitle(title);
        alert.setContentText(message);
        alert.showAndWait();
    }

    // Handle navigation back to the dashboard
    @FXML
    public void handleBackToDashboard(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/src/tugasbesar/dashboard.fxml"));
            Parent dashboardRoot = loader.load();
            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();
            stage.setScene(new Scene(dashboardRoot));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
            showAlert(ERROR_TITLE, DASHBOARD_ERROR_MESSAGE, Alert.AlertType.ERROR);
        }
    }
}
