<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\ContactMessage;

class ContactService
{
    /**
     * Store incoming contact/consultation request with audit logging.
     */
    public function handleSubmission(array $data, ?string $ipAddress = null, ?string $userAgent = null): ContactMessage
    {
        $productOrService = $data['product_interest'] ?? $data['service_interest'] ?? null;
        $subject = $data['subject'] ?? ($productOrService ? "Yêu cầu tư vấn: {$productOrService}" : 'Liên hệ tư vấn chung');

        $contact = ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company' => $data['company'] ?? null,
            'subject' => $subject,
            'product_interest' => $productOrService,
            'message' => $data['message'] ?? 'Khách hàng yêu cầu liên hệ trực tiếp.',
            'status' => 'new',
            'ip_address' => $ipAddress,
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'contact_submitted',
            'description' => "Khách hàng {$contact->name} ({$contact->email}) đã gửi yêu cầu: {$subject}",
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
        ]);

        return $contact;
    }
}
