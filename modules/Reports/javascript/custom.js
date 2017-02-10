function addFilterInput(e,t){var n=filters_arr[filters_count_map[current_filter_id]],i=n.qualify_select.options[n.qualify_select.selectedIndex].value,l=n.module_select,a=l.options[l.selectedIndex].value,l=filters_arr[filters_count_map[current_filter_id]].module_select,a=l.options[l.selectedIndex].value;"self"==a?(selected_module=current_module,module_defs[selected_module].field_defs):(selected_module=a,module_defs[full_table_list[a].module].field_defs),("undefined"==typeof i||""==i)&&(i="equals");var r=n.column_select.options[n.column_select.selectedIndex].value;("undefined"==typeof r||""==r)&&(r="");var _=all_fields[r].field_def,o=_.type;"undefined"!=typeof _.custom_type&&(o=_.custom_type),e.innerHTML="<table><tr></tr></table>";var u=e.getElementsByTagName("tr")[0];if("between"==i)addFilterInputTextBetween(u,t);else if("between_dates"==i)addFilterInputDateBetween(u,t);else if("between_datetimes"==i)addFilterInputDatetimesBetween(u,t);else if("empty"==i||"not_empty"==i)add_filter_option(n.qualify_select,i),addFilterNoInput(u,t);else if("date"==o||"datetime"==o)0==i.indexOf("tp_")?addFilterInputEmpty(u,t):addFilterInputDate(u,t);else if("datetimecombo"==o)0==i.indexOf("tp_")?addFilterInputEmpty(u,t):addFilterInputDatetimecombo(u,t);else if("id"==o||"name"==o||"fullname"==o)"undefined"!=typeof t.qualifier_name&&(i=t.qualifier_name),add_filter_option(n.qualify_select,i),"is"==i||"is_not"==i?addFilterInputRelate(u,_,t,!1):"one_of"==i||"not_one_of"==i?ajax_get_option_array(a,_.name,u,t):addFilterInputText(u,t);else if("relate"==o)"undefined"!=typeof t.qualifier_name&&(i=t.qualifier_name),add_filter_option(n.qualify_select,i),"is"==i||"is_not"==i?addFilterInputRelate(u,_,t,!0):"one_of"==i||"not_one_of"==i?ajax_get_option_array_relate(_,u,t):addFilterInputText(u,t);else if("user_name"==o||"assigned_user_name"==o)""==users_array&&loadXML(),"one_of"==i||"not_one_of"==i?(addFilterInputSelectMultiple(u,users_array,t),$("select[id=multiple_"+current_filter_id+"]").css("min-width","200px"),$("select[id=multiple_"+current_filter_id+"]").css("max-width","500px"),$("select[id=multiple_"+current_filter_id+"]").select2()):addFilterInputSelectSingle(u,users_array,t);else if("enum"==o||"radioenum"==o||"multienum"==o||"parent_type"==o||"timeperiod"==o||"currency_id"==o)"one_of"==i||"not_one_of"==i?(addFilterInputSelectMultiple(u,_.options,t),$("select[id=multiple_"+current_filter_id+"]").css("min-width","200px"),$("select[id=multiple_"+current_filter_id+"]").select2()):addFilterInputSelectSingle(u,_.options,t);else if("bool"==o){var d=["yes","no"];addFilterInputSelectSingle(u,d,t)}else addFilterInputText(u,t);return u}function add_filter_option(e,t){var n=0;for(i=0;i<e.length;i++)("one_of"==e.options[i].value||"not_one_of"==e.options[i].value)&&n++;if(0==n){var l=document.createElement("option");l.value="one_of",l.innerHTML="Is One Of",e.appendChild(l);var a=document.createElement("option");a.value="not_one_of",a.innerHTML="Is Not One Of",e.appendChild(a)}e.value=t}function ajax_get_option_array(e,t,n,i){var l=$("input[name=id]").val(),a=full_table_list[e].module;$.ajax({url:"index.php?module=Reports&action=custom_ajax&sugar_body_only=true",type:"POST",async:!0,data:{module_lap:a,field:t,report_id:l},dataType:"json",success:function(e){addFilterInputSelectMultiple(n,e.opt_arrar,i),$("select[id=multiple_"+current_filter_id+"]").css("min-width","200px"),$("select[id=multiple_"+current_filter_id+"]").select2()}})}function ajax_get_option_array_relate(e,t,n){var i=$("input[name=id]").val(),l=e.module;$.ajax({url:"index.php?module=Reports&action=custom_ajax&sugar_body_only=true",type:"POST",async:!0,data:{module_lap:l,field:field_name,report_id:i},dataType:"json",success:function(e){addFilterInputSelectMultiple(t,e.opt_arrar,n),$("select[id=multiple_"+current_filter_id+"]").css("min-width","200px"),$("select[id=multiple_"+current_filter_id+"]").select2()}})}function addFilterInputSelectMultiple(e,t,n){var l=document.createElement("td");e.appendChild(l);var a=new Object,r=new Array,_=new Object;_.size="5",_.multiple=!0,_.id="multiple_"+current_filter_id,a.select=_;var o=new Object;for(i=0;i<n.input_name0.length;i++)o[n.input_name0[i]]=1;for(i=0;i<Object.keys(t).length;i++){var u;if("undefined"==typeof t[i].text)option_text=t[i],u=t[i];else{if(""==t[i].value)continue;option_text=t[i].text,u=t[i].value}selected="undefined"!=typeof o[u]?!0:!1;var d=new Object;d.value=u,d.text=option_text,d.selected=selected,r[r.length]=d}a.options=r,l.innerHTML=buildSelectHTML(a);var p=filters_arr[filters_count_map[current_filter_id]];p.input_field0=l.getElementsByTagName("select")[0],p.input_field1=null}function refreshFilterInput(e,t){current_filter_id=t;var n=filters_arr[filters_count_map[t]];"undefined"!=typeof n.input_field0&&"undefined"!=typeof n.input_field0.value&&(type="input"),n.input_cell.removeChild(n.input_cell.firstChild),addFilterInput(n.input_cell,e)}function validateFilterRow(e,t){if(null!=e&&null!=e.runtime&&1==e.runtime){var n=document.getElementById(e.id),i=n.cells[2],l=n.cells[4],a=n.cells[5],r=i.getElementsByTagName("select")[0].value,_=all_fields[r].field_def;e.name=_.name,e.table_key=all_fields[r].linked_field_name,column_vname=all_fields[r].label_prefix+": "+_.vname,e.qualifier_name=l.getElementsByTagName("select")[0].value;var o=a.getElementsByTagName("input");if("not_one_of"==e.qualifier_name||"one_of"==e.qualifier_name){var u=0,d=a.getElementsByTagName("select")[0];for(e.input_name0=new Array,j=0;j<d.options.length;j++)1==d.options[j].selected&&(e.input_name0.push(decodeURI(d.options[j].value)),u=1);0==u&&(t.error_msgs+='"'+column_vname+'": '+lbl_missing_second_input_value+"\n",t.got_error=1)}else{if("undefined"!=typeof o[0])e.input_name0=o[0].value,""==o[0].value&&(t.got_error=1,t.error_msgs+='"'+column_vname+'"'+lbl_missing_input_value+"\n"),"undefined"!=typeof o[1]&&(e.input_name1=o[1].value,""==o[1].value&&(t.got_error=1,t.error_msgs+='"'+column_vname+'"'+lbl_missing_second_input_value+"\n")),"datetimecombo"==_.type&&("undefined"!=typeof o[2]&&(e.input_name2=o[2].value,""==o[2].value&&"checkbox"!=o[2].type&&(got_error=1,error_msgs+='"'+column_vname+'" '+lbl_missing_input_value+"\n")),"undefined"!=typeof o[3]&&(e.input_name3=o[3].value,""==o[3].value&&"checkbox"!=o[3].type&&(got_error=1,error_msgs+='"'+column_vname+'" '+lbl_missing_input_value+"\n")),"undefined"!=typeof o[4]&&(e.input_name4=o[4].value,""==o[4].value&&"checkbox"!=o[4].type&&(got_error=1,error_msgs+='"'+column_vname+'" '+lbl_missing_input_value+"\n")));else{var u=0,d=a.getElementsByTagName("select")[0];for(e.input_name0=new Array,j=0;j<d.options.length;j++)1==d.options[j].selected&&(e.input_name0.push(decodeURI(d.options[j].value)),u=1);0==u&&(t.error_msgs+='"'+column_vname+'": '+lbl_missing_second_input_value+"\n",t.got_error=1)}if("datetime"==_.type||"date"==_.type){if("undefined"!=typeof e.input_name0&&"array"!=typeof e.input_name0){var p=e.input_name0.match(date_reg_format);null!=p&&(e.input_name0=p[date_reg_positions.Y]+"-"+p[date_reg_positions.m]+"-"+p[date_reg_positions.d])}if("undefined"!=typeof e.input_name1&&"array"!=typeof e.input_name1){var p=e.input_name1.match(date_reg_format);null!=p&&(e.input_name1=p[date_reg_positions.Y]+"-"+p[date_reg_positions.m]+"-"+p[date_reg_positions.d])}}else if("datetimecombo"==_.type){if("undefined"!=typeof e.input_name0&&"array"!=typeof e.input_name0&&"undefined"!=typeof e.input_name1&&"array"!=typeof e.input_name1){var s=convertReportDateTimeToDB(e.input_name0,e.input_name1);""!=s&&(e.input_name0=s)}if("undefined"!=typeof e.input_name2&&"array"!=typeof e.input_name2&&"undefined"!=typeof e.input_name3&&"array"!=typeof e.input_name3){var s=convertReportDateTimeToDB(e.input_name2,e.input_name3);""!=s&&(e.input_name2=s)}}}}}function addFilter(e){filters_arr[filters_arr.length]=new Object,filters_count++,filters_count_map[filters_count]=filters_arr.length-1,current_filter_id=filters_count,"undefined"==typeof e&&(e=default_filter);var t=document.getElementById("filters"),n=document.createElement("tr");filters_arr[filters_count_map[filters_count]].row=n,n.valign="top",n.id="rowid"+filters_count,e.id=n.id;var i=document.createElement("td");i.valign="top",n.appendChild(i),filters_arr[filters_count_map[filters_count]].module_cell=i,addModuleSelectFilter(i,e,n);var l=document.createElement("td");l.valign="top",n.appendChild(l),filters_arr[filters_count_map[filters_count]].column_cell=l,addColumnSelectFilter(l,e,n);var a=document.createElement("td");a.valign="top",n.appendChild(a),filters_arr[filters_count_map[filters_count]].qualify_cell=a,addFilterQualify(a,e,n);var r=document.createElement("td");r.valign="top",n.appendChild(r),filters_arr[filters_count_map[filters_count]].input_cell=r,addFilterInput(r,e);var _=document.createElement("td");_.valign="top",n.appendChild(_),isRuntimeFilter(e)||(n.style.display="none"),t.appendChild(n),$("select[id=multiple_"+current_filter_id+"]").select2()}var current_index=0;