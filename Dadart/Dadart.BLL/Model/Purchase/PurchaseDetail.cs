using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.Purchase
{
    public class PurchaseDetail
    {        
        public int Quantity { get; set; }        
        public Guid ProductId { get; set; }
    }
}
