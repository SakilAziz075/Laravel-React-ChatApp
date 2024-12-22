import { usePage } from "@inertiajs/react";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const ChatLayout = ({user , header , children})=>{
    const page = usePage();
    const conversation = page.props.conversations;
    const selectedConversation = page.props.selectedConversation;

    console.log("conversation" , conversation);
    console.log("SelectedConversation" , selectedConversation);

    return  <AuthenticatedLayout>
        ChatLayout
        <div>{children}</div>
    </AuthenticatedLayout>
}

export default ChatLayout;