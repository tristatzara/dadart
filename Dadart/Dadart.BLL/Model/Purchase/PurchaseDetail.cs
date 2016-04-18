using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClassLibrary1.Model.Purchase
{
    class PurchaseDetail
    {
        public Guid PurchaseDatailId { get; set; }
        public int Quantity { get; set; }
        public Guid PurchaseId { get; set; }
        public Guid ProductId { get; set; }
    }
}
