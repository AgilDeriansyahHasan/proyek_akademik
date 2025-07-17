// src/tugasbesar/models/MedicineOrder.java
package src.tugasbesar.models;

public class MedicineOrder {
    private String name;
    private int quantity;
    private double totalPrice;

    public MedicineOrder(String name, int quantity, double totalPrice) {
        if (quantity <= 0) {
            throw new IllegalArgumentException("Jumlah harus lebih besar dari nol.");
        }
        if (totalPrice < 0) {
            throw new IllegalArgumentException("Total harga tidak boleh negatif.");
        }
        this.name = name;
        this.quantity = quantity;
        this.totalPrice = totalPrice;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getQuantity() {
        return quantity;
    }

    public void setQuantity(int quantity) {
        if (quantity <= 0) {
            throw new IllegalArgumentException("Jumlah harus lebih besar dari nol.");
        }
        this.quantity = quantity;
    }

    public double getTotalPrice() {
        return totalPrice;
    }

    public void setTotalPrice(double totalPrice) {
        if (totalPrice < 0) {
            throw new IllegalArgumentException("Total harga tidak boleh negatif.");
        }
        this.totalPrice = totalPrice;
    }

    @Override
    public String toString() {
        return "MedicineOrder{name='" + name + "', quantity=" + quantity + ", totalPrice=" + totalPrice + "}";
    }
}
