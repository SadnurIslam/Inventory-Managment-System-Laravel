<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order; 
use App\Models\Purchase;
use App\Models\Inventory;
// Assuming you have an Order model

class InvoiceController extends Controller
{
    public function generateOrderInvoice($orderId)
    {
        // Fetch the order data from the database
        $order = Order::where('id', $orderId)->first();
        // Load the invoice view and pass data
        $pdf = Pdf::loadView('invoices.invoice', compact('order'));

        // Download the PDF with a custom filename
        return $pdf->download("invoice_{$order->id}.pdf");
    }

    public function generatePurchaseInvoice($id)
    {
        // Fetch the order data from the database
        $purchase = Purchase::find( $id );
        $inventory = Inventory::where("product_name","=",$purchase->product_name)->first();
        // Load the invoice view and pass data
        $pdf = Pdf::loadView('invoices.invoice-purchase', compact(['inventory','purchase']));

        // Download the PDF with a custom filename
        return $pdf->download("invoice_{$purchase->id}.pdf");
    }
}
