<div id="timeframe_panel">
    <form action="" method="POST" name="ClassScheduleForm" id="ClassScheduleForm">
        <table class="list view" width="50%"> 
            <thead>
                <tr>
                    <th width="25%" align="center" style="text-align: center;">Weekday</th>
                    <th width="55%" align="center" style="text-align: center;">Time Slot <span class="required">*</span></th>
                    <th width="20%" align="center" class="hour_item" style="text-align: center;">Duration Hour <span class="required">*</span></th>
                    <th align="center" class="hour_item" style="display: none;">Revenue Hour <span class="required">*</span></th>
                    <th align="center" class="hour_item" style="display: none;">Teaching Hour <span class="required">*</span></th>
                </tr>
            </thead>
            <tbody>
                <tr id="TS_Mon" style="display: none;">
                    <td nowrap align="left" style="text-align: center;">Monday</td>

                    <td nowrap align="center">
                        <p class="timeOnly">
                            <input class="time start" type="text" style="width: 70px; text-align: center;">
                            - to -
                            <input class="time end" type="text" style="width: 70px; text-align: center;">
                        </p>
                    </td>
                    <td nowrap align="center" class="hour_item"><input type="text" class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="revenue_hour" style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="teaching_hour" style="width: 70px; text-align: center;"></td>
                </tr>
                <tr id="TS_Tue" style="display: none;">
                    <td nowrap align="left" style="text-align: center;">Tuesday</td>

                    <td nowrap align="center">
                        <p class="timeOnly">
                            <input class="time start" type="text" style="width: 70px; text-align: center;">
                            - to -
                            <input class="time end" type="text" style="width: 70px; text-align: center;">
                        </p>
                    </td>
                    <td nowrap align="center" class="hour_item"><input type="text" class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="revenue_hour" style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="teaching_hour" style="width: 70px; text-align: center;"></td>
                </tr>
                <tr id="TS_Wed" style="display: none;">
                    <td nowrap align="left" style="text-align: center;">Wednesday</td>

                    <td nowrap align="center">
                        <p class="timeOnly">
                            <input class="time start" type="text" style="width: 70px; text-align: center;">
                            - to -
                            <input class="time end" type="text" style="width: 70px; text-align: center;">
                        </p>
                    </td>
                    <td nowrap align="center" class="hour_item"><input type="text" class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="revenue_hour" style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="teaching_hour" style="width: 70px; text-align: center;"></td>
                </tr>
                <tr id="TS_Thu" style="display: none;">
                    <td nowrap align="left" style="text-align: center;">Thurday</td>

                    <td nowrap align="center">
                        <p class="timeOnly">
                            <input class="time start" type="text" style="width: 70px; text-align: center;">
                            - to -
                            <input class="time end" type="text" style="width: 70px; text-align: center;">
                        </p>
                    </td>
                    <td nowrap align="center" class="hour_item"><input type="text" class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="revenue_hour" style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="teaching_hour" style="width: 70px; text-align: center;"></td>
                </tr>
                <tr id="TS_Fri" style="display: none;">
                    <td nowrap align="left" style="text-align: center;">Friday</td>

                    <td nowrap align="center">
                        <p class="timeOnly">
                            <input class="time start" type="text" style="width: 70px; text-align: center;">
                            - to -
                            <input class="time end" type="text" style="width: 70px; text-align: center;">
                        </p>
                    </td>
                    <td nowrap align="center" class="hour_item"><input type="text" class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="revenue_hour" style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="teaching_hour" style="width: 70px; text-align: center;"></td>
                </tr>
                <tr id="TS_Sat" style="display: none;">
                    <td nowrap align="left" style="text-align: center;">Saturday</td>

                    <td nowrap align="center">
                        <p class="timeOnly">
                            <input class="time start" type="text" style="width: 70px; text-align: center;">
                            - to -
                            <input class="time end" type="text" style="width: 70px; text-align: center;">
                        </p>
                    </td>
                    <td nowrap align="center" class="hour_item"><input type="text" class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="revenue_hour" style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="teaching_hour" style="width: 70px; text-align: center;"></td>
                </tr>
                <tr id="TS_Sun" style="display: none;">
                    <td nowrap align="left" style="text-align: center;">Sunday</td>

                    <td nowrap align="center">
                        <p class="timeOnly">
                            <input class="time start" type="text" style="width: 70px; text-align: center;">
                            - to -
                            <input class="time end" type="text" style="width: 70px; text-align: center;">
                        </p>
                    </td>
                    <td nowrap align="center" class="hour_item"><input type="text" class="duration_hour input_readonly" readonly style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="revenue_hour" style="width: 70px; text-align: center;"></td>
                    <td nowrap align="center" class="hour_item" style="display: none;"><input type="text" class="teaching_hour" style="width: 70px; text-align: center;"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>