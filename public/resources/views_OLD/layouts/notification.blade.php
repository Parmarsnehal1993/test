<ul class="dropdown-menu notification-dropdown dropdown-menu-right" aria-labelledby="navbarDropdown" id="notification_list">

    <div class="notification-header">

        <a href="#">

        You Have {{ $notificationCount }} Notifactions

        </a>

    </div>

    <input type="hidden" id="notificationCount" value="{{ $notificationCount }}">

    @if(isset($allNotification) && !empty($allNotification))

        @foreach($allNotification as $allNotificationKey => $allNotificationValue)

            <li id="{{ 'notification_'.$allNotificationValue->id }}">

                <a href="javascript:void(0)" title="1" class="nav-link">

                <table class="table-full table-layout-auto">

                    <tr>

                        <td>

                            <img src="{{ getAgentProfileImage($allNotificationValue->agent_id) }}" alt="User" />

                        </td>

                        <td>{{ $allNotificationValue->user_id }}</td>

                        <td>

                            {{ $allNotificationValue->user_name }}

                        </td>

                        <td class="text-right">

                            <a href="{{ route('viewUser', $allNotificationValue->user_id) }}" class="btn btn-default-outlined" title="View Case">View Case</a>
                            <!-- <a href="javascript:void(0)" data-id="{{ $allNotificationValue->id }}"  class="mark_as_read btn btn-default-outlined" title="Mark as read">Mark as read</a> -->
                        </td>

                    </tr>

                    <tr>

                        <td>&nbsp;</td>

                        <td>{{ $allNotificationValue->description }}</td>

                        <td>&nbsp;</td>

                        <td class="text-right">
                            <a href="javascript:void(0)" data-id="{{ $allNotificationValue->id }}"  class="mark_as_read btn btn-default-outlined" title="Mark as read">Mark as read</a>
                        </td>

                    </tr>

                </table>

                </a>

            </li>

        @endforeach

    @endif

</ul>

<script type="text/javascript">

    // $('.nav-item.notifi-drop').click(function(e) {

    //     e.preventDefault();

    //     $('.notification-dropdown').toggle();

    // });

</script>