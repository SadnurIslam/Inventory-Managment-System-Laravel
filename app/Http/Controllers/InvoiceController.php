<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order; // Assuming you have an Order model

class InvoiceController extends Controller
{
    public function generateInvoice($orderId)
    {
        // Fetch the order data from the database
        $order = Order::where('id', $orderId)->first();
        // Load the invoice view and pass data
        $pdf = Pdf::loadView('invoices.invoice', compact('order'));

        // Download the PDF with a custom filename
        return $pdf->download("invoice_{$order->id}.pdf");
    }
}
